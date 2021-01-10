<?php
/**
 * PHP File Manager (2017-08-07)
 * https://github.com/alexantr/filemanager
 */

// Auth with login/password (set true/false to enable/disable it)
$use_auth = true;

// Users: array('Username' => 'Password', 'Username2' => 'Password2', ...)
$auth_users = array(
    'RootAdmin' => 'RTUser',
);

// Enable highlight.js (https://highlightjs.org/) on view's page
$use_highlightjs = true;

// highlight.js style
$highlightjs_style = 'vs';

// Default timezone for date() and time() - http://php.net/manual/en/timezones.php
$default_timezone = 'Europe/Minsk'; // UTC+3

// Root path for file manager
$root_path = $_SERVER['DOCUMENT_ROOT'];

// Root url for links in file manager.Relative to $http_host. Variants: '', 'path/to/subfolder'
// Will not working if $root_path will be outside of server document root
$root_url = '';

// Server hostname. Can set manually if wrong
$http_host = $_SERVER['HTTP_HOST'];

// input encoding for iconv
$iconv_input_encoding = 'CP1251';

// date() format for file modification date
$datetime_format = 'y/m/d H:i';

//--- EDIT BELOW CAREFULLY OR DO NOT EDIT AT ALL

// if fm included
if (defined('FM_EMBED')) {
    $use_auth = false;
} else {
    @set_time_limit(600);

    date_default_timezone_set($default_timezone);

    ini_set('default_charset', 'UTF-8');
    if (version_compare(PHP_VERSION, '5.6.0', '<') && function_exists('mb_internal_encoding')) {
        mb_internal_encoding('UTF-8');
    }
    if (function_exists('mb_regex_encoding')) {
        mb_regex_encoding('UTF-8');
    }

    session_cache_limiter('');
    session_name('filemanager');
    session_start();
}

if (empty($auth_users)) {
    $use_auth = false;
}

$is_https = isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS'] == 'on' || $_SERVER['HTTPS'] == 1)
    || isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https';

// clean and check $root_path
$root_path = rtrim($root_path, '\\/');
$root_path = str_replace('\\', '/', $root_path);
if (!@is_dir($root_path)) {
    echo sprintf('<h1>Root path "%s" not found!</h1>', fm_enc($root_path));
    exit;
}

// clean $root_url
$root_url = fm_clean_path($root_url);

// abs path for site
defined('FM_ROOT_PATH') || define('FM_ROOT_PATH', $root_path);
defined('FM_ROOT_URL') || define('FM_ROOT_URL', ($is_https ? 'https' : 'http') . '://' . $http_host . (!empty($root_url) ? '/' . $root_url : ''));
defined('FM_SELF_URL') || define('FM_SELF_URL', ($is_https ? 'https' : 'http') . '://' . $http_host . $_SERVER['PHP_SELF']);

// logout
if (isset($_GET['logout'])) {
    unset($_SESSION['logged']);
    fm_redirect(FM_SELF_URL);
}

// Show image here
if (isset($_GET['img'])) {
    fm_show_image($_GET['img']);
}

// Auth
if ($use_auth) {
    if (isset($_SESSION['logged'], $auth_users[$_SESSION['logged']])) {
        // Logged
    } elseif (isset($_POST['fm_usr'], $_POST['fm_pwd'])) {
        // Logging In
        sleep(1);
        if (isset($auth_users[$_POST['fm_usr']]) && $_POST['fm_pwd'] === $auth_users[$_POST['fm_usr']]) {
            $_SESSION['logged'] = $_POST['fm_usr'];
            fm_set_msg('你已登录');
            fm_redirect(FM_SELF_URL . '?p=');
        } else {
            unset($_SESSION['logged']);
            fm_set_msg('密码错误', 'error');
            fm_redirect(FM_SELF_URL);
        }
    } else {
        // Form
        unset($_SESSION['logged']);
        fm_show_header();
        fm_show_message();
        ?>
        <div style="height:320px;width:640px;"> <!--class="path"-->
            <form action="" method="post" style="margin:10px;text-align:center">
            <div class="wmuinotify-container"></div>
                <h3>文件资源管理器</h3>
                <input class="controls" name="fm_usr" value="" placeholder="用户名" required>
                <br><input class="controls" type="password" name="fm_pwd" value="" placeholder="密码" required>
                <br><input class='wmuibutton' type="submit" value="登录">
            </form>
        </div>
        <?php
        fm_show_footer();
        exit;
    }
}

define('FM_IS_WIN', DIRECTORY_SEPARATOR == '\\');

// always use ?p=
if (!isset($_GET['p'])) {
    fm_redirect(FM_SELF_URL . '?p=');
}

// get path
$p = isset($_GET['p']) ? $_GET['p'] : (isset($_POST['p']) ? $_POST['p'] : '');

// clean path
$p = fm_clean_path($p);

// instead globals vars
define('FM_PATH', $p);
define('FM_USE_AUTH', $use_auth);

defined('FM_ICONV_INPUT_ENC') || define('FM_ICONV_INPUT_ENC', $iconv_input_encoding);
defined('FM_USE_HIGHLIGHTJS') || define('FM_USE_HIGHLIGHTJS', $use_highlightjs);
defined('FM_HIGHLIGHTJS_STYLE') || define('FM_HIGHLIGHTJS_STYLE', $highlightjs_style);
defined('FM_DATETIME_FORMAT') || define('FM_DATETIME_FORMAT', $datetime_format);

unset($p, $use_auth, $iconv_input_encoding, $use_highlightjs, $highlightjs_style);

/*************************** ACTIONS ***************************/

// Delete file / folder
if (isset($_GET['del'])) {
    $del = $_GET['del'];
    $del = fm_clean_path($del);
    $del = str_replace('/', '', $del);
    if ($del != '' && $del != '..' && $del != '.') {
        $path = FM_ROOT_PATH;
        if (FM_PATH != '') {
            $path .= '/' . FM_PATH;
        }
        $is_dir = is_dir($path . '/' . $del);
        if (fm_rdelete($path . '/' . $del)) {
            $msg = $is_dir ? '文件夹 <b>%s</b> 已删除' : '文件 <b>%s</b> 已删除';
            fm_set_msg(sprintf($msg, fm_enc($del)));
        } else {
            $msg = $is_dir ? '文件夹 <b>%s</b> 未删除' : '文件 <b>%s</b> 未删除';
            fm_set_msg(sprintf($msg, fm_enc($del)), 'error');
        }
    } else {
        fm_set_msg('错误的文件或文件夹名称', 'error');
    }
    fm_redirect(FM_SELF_URL . '?p=' . urlencode(FM_PATH));
}

// Create folder
if (isset($_GET['new'])) {
    $new = strip_tags($_GET['new']); // remove unwanted characters from folder name
    $new = fm_clean_path($new);
    $new = str_replace('/', '', $new);
    if ($new != '' && $new != '..' && $new != '.') {
        $path = FM_ROOT_PATH;
        if (FM_PATH != '') {
            $path .= '/' . FM_PATH;
        }
        if (fm_mkdir($path . '/' . $new, false) === true) {
            fm_set_msg(sprintf('文件夹 <b>%s</b> 已被创建', fm_enc($new)));
        } elseif (fm_mkdir($path . '/' . $new, false) === $path . '/' . $new) {
            fm_set_msg(sprintf('文件夹 <b>%s</b> 已经存在', fm_enc($new)), 'warning');
        } else {
            fm_set_msg(sprintf('文件夹 <b>%s</b> 未创建', fm_enc($new)), 'error');
        }
    } else {
        fm_set_msg('错误的文件夹名称', 'error');
    }
    fm_redirect(FM_SELF_URL . '?p=' . urlencode(FM_PATH));
}

// Copy folder / file
if (isset($_GET['copy'], $_GET['finish'])) {
    // from
    $copy = $_GET['copy'];
    $copy = fm_clean_path($copy);
    // empty path
    if ($copy == '') {
        fm_set_msg('未定义的原路径', 'error');
        fm_redirect(FM_SELF_URL . '?p=' . urlencode(FM_PATH));
    }
    // abs path from
    $from = FM_ROOT_PATH . '/' . $copy;
    // abs path to
    $dest = FM_ROOT_PATH;
    if (FM_PATH != '') {
        $dest .= '/' . FM_PATH;
    }
    $dest .= '/' . basename($from);
    // move?
    $move = isset($_GET['move']);
    // copy/move
    if ($from != $dest) {
        $msg_from = trim(FM_PATH . '/' . basename($from), '/');
        if ($move) {
            $rename = fm_rename($from, $dest);
            if ($rename) {
                fm_set_msg(sprintf('从 <b>%s</b> 移动到 <b>%s</b>', fm_enc($copy), fm_enc($msg_from)));
            } elseif ($rename === null) {
                fm_set_msg('已存在此路径上的同名的文件或文件夹', 'warning');
            } else {
                fm_set_msg(sprintf('在从 <b>%s</b> 移动到 <b>%s</b> 时发生错误', fm_enc($copy), fm_enc($msg_from)), 'error');
            }
        } else {
            if (fm_rcopy($from, $dest)) {
                fm_set_msg(sprintf('从 <b>%s</b> 复制到 <b>%s</b>', fm_enc($copy), fm_enc($msg_from)));
            } else {
                fm_set_msg(sprintf('在从 <b>%s</b> 复制到 <b>%s</b> 时发生错误', fm_enc($copy), fm_enc($msg_from)), 'error');
            }
        }
    } else {
        fm_set_msg('路径不能完全一致', 'warning');
    }
    fm_redirect(FM_SELF_URL . '?p=' . urlencode(FM_PATH));
}

// Mass copy files/ folders
if (isset($_POST['file'], $_POST['copy_to'], $_POST['finish'])) {
    // from
    $path = FM_ROOT_PATH;
    if (FM_PATH != '') {
        $path .= '/' . FM_PATH;
    }
    // to
    $copy_to_path = FM_ROOT_PATH;
    $copy_to = fm_clean_path($_POST['copy_to']);
    if ($copy_to != '') {
        $copy_to_path .= '/' . $copy_to;
    }
    if ($path == $copy_to_path) {
        fm_set_msg('路径不能完全一致', 'warning');
        fm_redirect(FM_SELF_URL . '?p=' . urlencode(FM_PATH));
    }
    if (!is_dir($copy_to_path)) {
        if (!fm_mkdir($copy_to_path, true)) {
            fm_set_msg('无法创建目标文件夹', 'error');
            fm_redirect(FM_SELF_URL . '?p=' . urlencode(FM_PATH));
        }
    }
    // move?
    $move = isset($_POST['move']);
    // copy/move
    $errors = 0;
    $files = $_POST['file'];
    if (is_array($files) && count($files)) {
        foreach ($files as $f) {
            if ($f != '') {
                // abs path from
                $from = $path . '/' . $f;
                // abs path to
                $dest = $copy_to_path . '/' . $f;
                // do
                if ($move) {
                    $rename = fm_rename($from, $dest);
                    if ($rename === false) {
                        $errors++;
                    }
                } else {
                    if (!fm_rcopy($from, $dest)) {
                        $errors++;
                    }
                }
            }
        }
        if ($errors == 0) {
            $msg = $move ? '已移动所选文件和文件夹' : '已复制所选文件和文件夹';
            fm_set_msg($msg);
        } else {
            $msg = $move ? '移动项目时出错' : '复制项目时出错';
            fm_set_msg($msg, 'error');
        }
    } else {
        fm_set_msg('没有已选择的内容', 'warning');
    }
    fm_redirect(FM_SELF_URL . '?p=' . urlencode(FM_PATH));
}

// Rename
if (isset($_GET['ren'], $_GET['to'])) {
    // old name
    $old = $_GET['ren'];
    $old = fm_clean_path($old);
    $old = str_replace('/', '', $old);
    // new name
    $new = $_GET['to'];
    $new = fm_clean_path($new);
    $new = str_replace('/', '', $new);
    // path
    $path = FM_ROOT_PATH;
    if (FM_PATH != '') {
        $path .= '/' . FM_PATH;
    }
    // rename
    if ($old != '' && $new != '') {
        if (fm_rename($path . '/' . $old, $path . '/' . $new)) {
            fm_set_msg(sprintf('将 <b>%s</b> 重命名为 <b>%s</b>', fm_enc($old), fm_enc($new)));
        } else {
            fm_set_msg(sprintf('在将 <b>%s</b> 重命名为 <b>%s</b> 时遇到错误', fm_enc($old), fm_enc($new)), 'error');
        }
    } else {
        fm_set_msg('未设置名称', 'error');
    }
    fm_redirect(FM_SELF_URL . '?p=' . urlencode(FM_PATH));
}

// Download
if (isset($_GET['dl'])) {
    $dl = $_GET['dl'];
    $dl = fm_clean_path($dl);
    $dl = str_replace('/', '', $dl);
    $path = FM_ROOT_PATH;
    if (FM_PATH != '') {
        $path .= '/' . FM_PATH;
    }
    if ($dl != '' && is_file($path . '/' . $dl)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . basename($path . '/' . $dl) . '"');
        header('Content-Transfer-Encoding: binary');
        header('Connection: Keep-Alive');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        header('Content-Length: ' . filesize($path . '/' . $dl));
        readfile($path . '/' . $dl);
        exit;
    } else {
        fm_set_msg('找不到指定的文件', 'error');
        fm_redirect(FM_SELF_URL . '?p=' . urlencode(FM_PATH));
    }
}

// Upload
if (isset($_POST['upl'])) {
    $path = FM_ROOT_PATH;
    if (FM_PATH != '') {
        $path .= '/' . FM_PATH;
    }

    $errors = 0;
    $uploads = 0;
    $total = count($_FILES['upload']['name']);

    for ($i = 0; $i < $total; $i++) {
        $tmp_name = $_FILES['upload']['tmp_name'][$i];
        if (empty($_FILES['upload']['error'][$i]) && !empty($tmp_name) && $tmp_name != 'none') {
            if (move_uploaded_file($tmp_name, $path . '/' . $_FILES['upload']['name'][$i])) {
                $uploads++;
            } else {
                $errors++;
            }
        }
    }

    if ($errors == 0 && $uploads > 0) {
        fm_set_msg(sprintf('全部文件已经上传到 <b>%s</b>', fm_enc($path)));
    } elseif ($errors == 0 && $uploads == 0) {
        fm_set_msg('没有文件被上传', 'warning');
    } else {
        fm_set_msg(sprintf('在上传文件时发生错误. 上传文件: %s', $uploads), 'error');
    }

    fm_redirect(FM_SELF_URL . '?p=' . urlencode(FM_PATH));
}

// Mass deleting
if (isset($_POST['group'], $_POST['delete'])) {
    $path = FM_ROOT_PATH;
    if (FM_PATH != '') {
        $path .= '/' . FM_PATH;
    }

    $errors = 0;
    $files = $_POST['file'];
    if (is_array($files) && count($files)) {
        foreach ($files as $f) {
            if ($f != '') {
                $new_path = $path . '/' . $f;
                if (!fm_rdelete($new_path)) {
                    $errors++;
                }
            }
        }
        if ($errors == 0) {
            fm_set_msg('已删除选择的文件和文件夹');
        } else {
            fm_set_msg('在删除项目时遇到问题', 'error');
        }
    } else {
        fm_set_msg('没有已选择的项目', 'warning');
    }

    fm_redirect(FM_SELF_URL . '?p=' . urlencode(FM_PATH));
}

// Pack files
if (isset($_POST['group'], $_POST['zip'])) {
    $path = FM_ROOT_PATH;
    if (FM_PATH != '') {
        $path .= '/' . FM_PATH;
    }

    if (!class_exists('ZipArchive')) {
        fm_set_msg('对此压缩文件的操作不可用', 'error');
        fm_redirect(FM_SELF_URL . '?p=' . urlencode(FM_PATH));
    }

    $files = $_POST['file'];
    if (!empty($files)) {
        chdir($path);

        if (count($files) == 1) {
            $one_file = reset($files);
            $one_file = basename($one_file);
            $zipname = $one_file . '_' . date('ymd_His') . '.zip';
        } else {
            $zipname = 'archive_' . date('ymd_His') . '.zip';
        }

        $zipper = new FM_Zipper();
        $res = $zipper->create($zipname, $files);

        if ($res) {
            fm_set_msg(sprintf('压缩文件 <b>%s</b> 已创建', fm_enc($zipname)));
        } else {
            fm_set_msg('压缩文件未创建', 'error');
        }
    } else {
        fm_set_msg('没有已选择的项目', 'warning');
    }

    fm_redirect(FM_SELF_URL . '?p=' . urlencode(FM_PATH));
}

// Unpack
if (isset($_GET['unzip'])) {
    $unzip = $_GET['unzip'];
    $unzip = fm_clean_path($unzip);
    $unzip = str_replace('/', '', $unzip);

    $path = FM_ROOT_PATH;
    if (FM_PATH != '') {
        $path .= '/' . FM_PATH;
    }

    if (!class_exists('ZipArchive')) {
        fm_set_msg('对此压缩文件的操作不可用', 'error');
        fm_redirect(FM_SELF_URL . '?p=' . urlencode(FM_PATH));
    }

    if ($unzip != '' && is_file($path . '/' . $unzip)) {
        $zip_path = $path . '/' . $unzip;

        //to folder
        $tofolder = '';
        if (isset($_GET['tofolder'])) {
            $tofolder = pathinfo($zip_path, PATHINFO_FILENAME);
            if (fm_mkdir($path . '/' . $tofolder, true)) {
                $path .= '/' . $tofolder;
            }
        }

        $zipper = new FM_Zipper();
        $res = $zipper->unzip($zip_path, $path);

        if ($res) {
            fm_set_msg('压缩文件已解压');
        } else {
            fm_set_msg('压缩文件没有解压', 'error');
        }

    } else {
        fm_set_msg('找不到指定的文件', 'error');
    }
    fm_redirect(FM_SELF_URL . '?p=' . urlencode(FM_PATH));
}

// Change Perms (not for Windows)
if (isset($_POST['chmod']) && !FM_IS_WIN) {
    $path = FM_ROOT_PATH;
    if (FM_PATH != '') {
        $path .= '/' . FM_PATH;
    }

    $file = $_POST['chmod'];
    $file = fm_clean_path($file);
    $file = str_replace('/', '', $file);
    if ($file == '' || (!is_file($path . '/' . $file) && !is_dir($path . '/' . $file))) {
        fm_set_msg('找不到指定的文件', 'error');
        fm_redirect(FM_SELF_URL . '?p=' . urlencode(FM_PATH));
    }

    $mode = 0;
    if (!empty($_POST['ur'])) {
        $mode |= 0400;
    }
    if (!empty($_POST['uw'])) {
        $mode |= 0200;
    }
    if (!empty($_POST['ux'])) {
        $mode |= 0100;
    }
    if (!empty($_POST['gr'])) {
        $mode |= 0040;
    }
    if (!empty($_POST['gw'])) {
        $mode |= 0020;
    }
    if (!empty($_POST['gx'])) {
        $mode |= 0010;
    }
    if (!empty($_POST['or'])) {
        $mode |= 0004;
    }
    if (!empty($_POST['ow'])) {
        $mode |= 0002;
    }
    if (!empty($_POST['ox'])) {
        $mode |= 0001;
    }

    if (@chmod($path . '/' . $file, $mode)) {
        fm_set_msg('权限已更改');
    } else {
        fm_set_msg('权限没有更改', 'error');
    }

    fm_redirect(FM_SELF_URL . '?p=' . urlencode(FM_PATH));
}

/*************************** /ACTIONS ***************************/

// get current path
$path = FM_ROOT_PATH;
if (FM_PATH != '') {
    $path .= '/' . FM_PATH;
}

// check path
if (!is_dir($path)) {
    fm_redirect(FM_SELF_URL . '?p=');
}

// get parent folder
$parent = fm_get_parent_path(FM_PATH);

$objects = is_readable($path) ? scandir($path) : array();
$folders = array();
$files = array();
if (is_array($objects)) {
    foreach ($objects as $file) {
        if ($file == '.' || $file == '..') {
            continue;
        }
        $new_path = $path . '/' . $file;
        if (is_file($new_path)) {
            $files[] = $file;
        } elseif (is_dir($new_path) && $file != '.' && $file != '..') {
            $folders[] = $file;
        }
    }
}

if (!empty($files)) {
    natcasesort($files);
}
if (!empty($folders)) {
    natcasesort($folders);
}

// upload form
if (isset($_GET['upload'])) {
    fm_show_header(); // HEADER
    fm_show_nav_path(FM_PATH); // current path
    ?>
    <div class="path">
        <p><b>上传文件</b></p>
        <p class="break-word">到文件夹: <?php echo fm_enc(fm_convert_win(FM_ROOT_PATH . '/' . FM_PATH)) ?></p>
        <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="p" value="<?php echo fm_enc(FM_PATH) ?>">
            <input type="hidden" name="upl" value="1">
            <input type="file" name="upload[]"><br>
            <input type="file" name="upload[]"><br>
            <input type="file" name="upload[]"><br>
            <input type="file" name="upload[]"><br>
            <input type="file" name="upload[]"><br>
            <br>
            <p>
                <button class="wmuibutton">上传</button> &nbsp;
                <b><a class="wmuibutton" href="?p=<?php echo urlencode(FM_PATH) ?>">取消</a></b>
            </p>
        </form>
    </div>
    <?php
    fm_show_footer();
    exit;
}

// copy form POST
if (isset($_POST['copy'])) {
    $copy_files = $_POST['file'];
    if (!is_array($copy_files) || empty($copy_files)) {
        fm_set_msg('没有已选择的项目', 'warning');
        fm_redirect(FM_SELF_URL . '?p=' . urlencode(FM_PATH));
    }

    fm_show_header(); // HEADER
    fm_show_nav_path(FM_PATH); // current path
    ?>
    <div class="path">
        <p><b>复制</b></p>
        <form action="" method="post">
            <input type="hidden" name="p" value="<?php echo fm_enc(FM_PATH) ?>">
            <input type="hidden" name="finish" value="1">
            <?php
            foreach ($copy_files as $cf) {
                echo '<input type="hidden" name="file[]" value="' . fm_enc($cf) . '">' . PHP_EOL;
            }
            $copy_files_enc = array_map('fm_enc', $copy_files);
            ?>
            <p class="break-word">文件: <b><?php echo implode('</b>, <b>', $copy_files_enc) ?></b></p>
            <p class="break-word">原文件夹: <?php echo fm_enc(fm_convert_win(FM_ROOT_PATH . '/' . FM_PATH)) ?><br>
                <label for="inp_copy_to">目标文件夹:</label>
                <?php echo FM_ROOT_PATH ?>/<input name="copy_to" id="inp_copy_to" value="<?php echo fm_enc(FM_PATH) ?>">
            </p>
            <p><label><input class="wmuibutton" type="checkbox" name="move" value="1"> 移动</label></p>
            <p>
                <button class="wmuibutton">复制</button> &nbsp;
                <b><a class="wmuibutton" href="?p=<?php echo urlencode(FM_PATH) ?>">取消</a></b>
            </p>
        </form>
    </div>
    <?php
    fm_show_footer();
    exit;
}

// copy form
if (isset($_GET['copy']) && !isset($_GET['finish'])) {
    $copy = $_GET['copy'];
    $copy = fm_clean_path($copy);
    if ($copy == '' || !file_exists(FM_ROOT_PATH . '/' . $copy)) {
        fm_set_msg('找不到指定的文件', 'error');
        fm_redirect(FM_SELF_URL . '?p=' . urlencode(FM_PATH));
    }

    fm_show_header(); // HEADER
    fm_show_nav_path(FM_PATH); // current path
    ?>
    <div class="path">
        <p><b>复制</b></p>
        <p class="break-word">
            原文件夹: <?php echo fm_enc(fm_convert_win(FM_ROOT_PATH . '/' . $copy)) ?><br>
            目标文件夹: <?php echo fm_enc(fm_convert_win(FM_ROOT_PATH . '/' . FM_PATH)) ?>
        </p>
        <p>
            <b><a class="wmuibutton" href="?p=<?php echo urlencode(FM_PATH) ?>&amp;copy=<?php echo urlencode($copy) ?>&amp;finish=1">复制</a></b> &nbsp;
            <b><a class="wmuibutton" href="?p=<?php echo urlencode(FM_PATH) ?>&amp;copy=<?php echo urlencode($copy) ?>&amp;finish=1&amp;move=1">移动</a></b> &nbsp;
            <b><a class="wmuibutton" href="?p=<?php echo urlencode(FM_PATH) ?>">取消</a></b>
        </p>
        <p><i>选择文件夹:</i></p>
        <ul class="folders break-word">
            <?php
            if ($parent !== false) {
                ?>
                <li><a href="?p=<?php echo urlencode($parent) ?>&amp;copy=<?php echo urlencode($copy) ?>"><i class="icon-arrow_up"></i> ..</a></li>
            <?php
            }
            foreach ($folders as $f) {
                ?>
                <li><a href="?p=<?php echo urlencode(trim(FM_PATH . '/' . $f, '/')) ?>&amp;copy=<?php echo urlencode($copy) ?>"><i class="icon-folder"></i> <?php echo fm_enc(fm_convert_win($f)) ?></a></li>
            <?php
            }
            ?>
        </ul>
    </div>
    <?php
    fm_show_footer();
    exit;
}

// file viewer
if (isset($_GET['view'])) {
    $file = $_GET['view'];
    $file = fm_clean_path($file);
    $file = str_replace('/', '', $file);
    if ($file == '' || !is_file($path . '/' . $file)) {
        fm_set_msg('File not found', 'error');
        fm_redirect(FM_SELF_URL . '?p=' . urlencode(FM_PATH));
    }

    fm_show_header(); // HEADER
    fm_show_nav_path(FM_PATH); // current path

    $file_url = FM_ROOT_URL . fm_convert_win((FM_PATH != '' ? '/' . FM_PATH : '') . '/' . $file);
    $file_path = $path . '/' . $file;

    $ext = strtolower(pathinfo($file_path, PATHINFO_EXTENSION));
    $mime_type = fm_get_mime_type($file_path);
    $filesize = filesize($file_path);

    $is_zip = false;
    $is_image = false;
    $is_audio = false;
    $is_video = false;
    $is_text = false;

    $view_title = '文件';
    $filenames = false; // for zip
    $content = ''; // for text

    if ($ext == 'zip') {
        $is_zip = true;
        $view_title = '压缩文件';
        $filenames = fm_get_zif_info($file_path);
    } elseif (in_array($ext, fm_get_image_exts())) {
        $is_image = true;
        $view_title = '图像';
    } elseif (in_array($ext, fm_get_audio_exts())) {
        $is_audio = true;
        $view_title = '音频';
    } elseif (in_array($ext, fm_get_video_exts())) {
        $is_video = true;
        $view_title = '视频';
    } elseif (in_array($ext, fm_get_text_exts()) || substr($mime_type, 0, 4) == 'text' || in_array($mime_type, fm_get_text_mimes())) {
        $is_text = true;
        $content = file_get_contents($file_path);
    }

    ?>
    <div class="path">
        <p class="break-word"><b><?php echo $view_title ?> "<?php echo fm_enc(fm_convert_win($file)) ?>"</b></p>
        <p class="break-word">
            完整路径: <?php echo fm_enc(fm_convert_win($file_path)) ?><br>
            文件大小: <?php echo fm_get_filesize($filesize) ?><?php if ($filesize >= 1000): ?> (<?php echo sprintf('%s bytes', $filesize) ?>)<?php endif; ?><br>
            MIME类型: <?php echo $mime_type ?><br>
            <?php
            // ZIP info
            if ($is_zip && $filenames !== false) {
                $total_files = 0;
                $total_comp = 0;
                $total_uncomp = 0;
                foreach ($filenames as $fn) {
                    if (!$fn['folder']) {
                        $total_files++;
                    }
                    $total_comp += $fn['compressed_size'];
                    $total_uncomp += $fn['filesize'];
                }
                ?>
                压缩文件中的文件: <?php echo $total_files ?><br>
                总大小: <?php echo fm_get_filesize($total_uncomp) ?><br>
                压缩后的大小: <?php echo fm_get_filesize($total_comp) ?><br>
                压缩: <?php echo round(($total_comp / $total_uncomp) * 100) ?>%<br>
                <?php
            }
            // Image info
            if ($is_image) {
                $image_size = getimagesize($file_path);
                echo '图像大小: ' . (isset($image_size[0]) ? $image_size[0] : '0') . ' x ' . (isset($image_size[1]) ? $image_size[1] : '0') . '<br>';
            }
            // Text info
            if ($is_text) {
                $is_utf8 = fm_is_utf8($content);
                if (function_exists('iconv')) {
                    if (!$is_utf8) {
                        $content = iconv(FM_ICONV_INPUT_ENC, 'UTF-8//IGNORE', $content);
                    }
                }
                echo '编码: ' . ($is_utf8 ? 'utf-8' : '8 bit') . '<br>';
            }
            ?>
        </p>
        <p>
            <b><a class="wmuibutton" href="?p=<?php echo urlencode(FM_PATH) ?>&amp;dl=<?php echo urlencode($file) ?>"><i class="icon-download"></i>下载</a></b> &nbsp;
            <b><a class="wmuibutton" href="<?php echo fm_enc($file_url) ?>" target="_blank"><i class="icon-chain"></i>打开</a></b> &nbsp;
            <?php
            // ZIP actions
            if ($is_zip && $filenames !== false) {
                $zip_name = pathinfo($file_path, PATHINFO_FILENAME);
                ?>
                <b><a class="wmuibutton" href="?p=<?php echo urlencode(FM_PATH) ?>&amp;unzip=<?php echo urlencode($file) ?>"><i class="icon-apply"></i>解压</a></b> &nbsp;
                <b><a class="wmuibutton" href="?p=<?php echo urlencode(FM_PATH) ?>&amp;unzip=<?php echo urlencode($file) ?>&amp;tofolder=1" title="解压 <?php echo fm_enc($zip_name) ?>"><i class="icon-apply"></i>
                    解压到文件夹</a></b> &nbsp;
                <?php
            }
            ?>
            <b><a class="wmuibutton" href="?p=<?php echo urlencode(FM_PATH) ?>"><i class="icon-goback"></i>返回</a></b>
        </p>
        <?php
        if ($is_zip) {
            // ZIP content
            if ($filenames !== false) {
                echo '<code class="maxheight">';
                foreach ($filenames as $fn) {
                    if ($fn['folder']) {
                        echo '<b>' . fm_enc($fn['name']) . '</b><br>';
                    } else {
                        echo $fn['name'] . ' (' . fm_get_filesize($fn['filesize']) . ')<br>';
                    }
                }
                echo '</code>';
            } else {
                echo '<p>获取压缩信息时出错</p>';
            }
        } elseif ($is_image) {
            // Image content
            if (in_array($ext, array('gif', 'jpg', 'jpeg', 'png', 'bmp', 'ico'))) {
                echo '<p><img src="' . fm_enc($file_url) . '" alt="" class="preview-img"></p>';
            }
        } elseif ($is_audio) {
            // Audio content
            echo '<p><audio src="' . fm_enc($file_url) . '" controls preload="metadata"></audio></p>';
        } elseif ($is_video) {
            // Video content
            echo '<div class="preview-video"><video src="' . fm_enc($file_url) . '" width="640" height="360" controls preload="metadata"></video></div>';
        } elseif ($is_text) {
            if (FM_USE_HIGHLIGHTJS) {
                // highlight
                $hljs_classes = array(
                    'shtml' => 'xml',
                    'htaccess' => 'apache',
                    'phtml' => 'php',
                    'lock' => 'json',
                    'svg' => 'xml',
                );
                $hljs_class = isset($hljs_classes[$ext]) ? 'lang-' . $hljs_classes[$ext] : 'lang-' . $ext;
                if (empty($ext) || in_array(strtolower($file), fm_get_text_names()) || preg_match('#\.min\.(css|js)$#i', $file)) {
                    $hljs_class = 'nohighlight';
                }
                $content = '<pre class="with-hljs"><code class="' . $hljs_class . '">' . fm_enc($content) . '</code></pre>';
            } elseif (in_array($ext, array('php', 'php4', 'php5', 'phtml', 'phps'))) {
                // php highlight
                $content = highlight_string($content, true);
            } else {
                $content = '<pre>' . fm_enc($content) . '</pre>';
            }
            echo $content;
        }
        ?>
    </div>
    <?php
    fm_show_footer();
    exit;
}

// chmod (not for Windows)
if (isset($_GET['chmod']) && !FM_IS_WIN) {
    $file = $_GET['chmod'];
    $file = fm_clean_path($file);
    $file = str_replace('/', '', $file);
    if ($file == '' || (!is_file($path . '/' . $file) && !is_dir($path . '/' . $file))) {
        fm_set_msg('找不到指定的文件', 'error');
        fm_redirect(FM_SELF_URL . '?p=' . urlencode(FM_PATH));
    }

    fm_show_header(); // HEADER
    fm_show_nav_path(FM_PATH); // current path

    $file_url = FM_ROOT_URL . (FM_PATH != '' ? '/' . FM_PATH : '') . '/' . $file;
    $file_path = $path . '/' . $file;

    $mode = fileperms($path . '/' . $file);

    ?>
    <div class="path">
        <p><b>修改权限</b></p>
        <p>
            完整路径: <?php echo fm_enc($file_path) ?><br>
        </p>
        <form action="" method="post">
            <input type="hidden" name="p" value="<?php echo fm_enc(FM_PATH) ?>">
            <input type="hidden" name="chmod" value="<?php echo fm_enc($file) ?>">

            <table class="compact-table">
                <tr>
                    <td></td>
                    <td><b>用户</b></td>
                    <td><b>团体</b></td>
                    <td><b>其它</b></td>
                </tr>
                <tr>
                    <td style="text-align: right"><b>读取</b></td>
                    <td><label><input type="checkbox" name="ur" value="1"<?php echo ($mode & 00400) ? ' checked' : '' ?>></label></td>
                    <td><label><input type="checkbox" name="gr" value="1"<?php echo ($mode & 00040) ? ' checked' : '' ?>></label></td>
                    <td><label><input type="checkbox" name="or" value="1"<?php echo ($mode & 00004) ? ' checked' : '' ?>></label></td>
                </tr>
                <tr>
                    <td style="text-align: right"><b>写入</b></td>
                    <td><label><input type="checkbox" name="uw" value="1"<?php echo ($mode & 00200) ? ' checked' : '' ?>></label></td>
                    <td><label><input type="checkbox" name="gw" value="1"<?php echo ($mode & 00020) ? ' checked' : '' ?>></label></td>
                    <td><label><input type="checkbox" name="ow" value="1"<?php echo ($mode & 00002) ? ' checked' : '' ?>></label></td>
                </tr>
                <tr>
                    <td style="text-align: right"><b>执行</b></td>
                    <td><label><input type="checkbox" name="ux" value="1"<?php echo ($mode & 00100) ? ' checked' : '' ?>></label></td>
                    <td><label><input type="checkbox" name="gx" value="1"<?php echo ($mode & 00010) ? ' checked' : '' ?>></label></td>
                    <td><label><input type="checkbox" name="ox" value="1"<?php echo ($mode & 00001) ? ' checked' : '' ?>></label></td>
                </tr>
            </table>

            <p>
                <button class="wmuibutton">修改</button> &nbsp;
                <b><a class="wmuibutton" href="?p=<?php echo urlencode(FM_PATH) ?>"><i class="icon-cancel"></i>取消</a></b>
            </p>

        </form>

    </div>
    <?php
    fm_show_footer();
    exit;
}

//--- FILEMANAGER MAIN
fm_show_header(); // HEADER
fm_show_nav_path(FM_PATH); // current path

// messages
fm_show_message();

$num_files = count($files);
$num_folders = count($folders);
$all_files_size = 0;
?>
<form action="" method="post">
<input type="hidden" name="p" value="<?php echo fm_enc(FM_PATH) ?>">
<input type="hidden" name="group" value="1">
<table><tr>
<th style="width:3%"><label><input type="checkbox" title="Invert selection" onclick="checkbox_toggle()"></label></th>
<th>名称</th><th style="width:10%">大小</th>
<th style="width:12%">修改日期</th>
<?php if (!FM_IS_WIN): ?><th style="width:6%">Perms</th><th style="width:10%">Owner</th><?php endif; ?>
<th style="width:13%"></th></tr>
<?php
// link to parent folder
if ($parent !== false) {
    ?>
<tr><td></td><td colspan="<?php echo !FM_IS_WIN ? '6' : '4' ?>"><a href="?p=<?php echo urlencode($parent) ?>"><i class="icon-arrow_up"></i> ..</a></td></tr>
<?php
}
foreach ($folders as $f) {
    $is_link = is_link($path . '/' . $f);
    $img = $is_link ? 'icon-link_folder' : 'icon-folder';
    $modif = date(FM_DATETIME_FORMAT, filemtime($path . '/' . $f));
    $perms = substr(decoct(fileperms($path . '/' . $f)), -4);
    if (function_exists('posix_getpwuid') && function_exists('posix_getgrgid')) {
        $owner = posix_getpwuid(fileowner($path . '/' . $f));
        $group = posix_getgrgid(filegroup($path . '/' . $f));
    } else {
        $owner = array('name' => '?');
        $group = array('name' => '?');
    }
    ?>
<tr>
<td><label><input type="checkbox" name="file[]" value="<?php echo fm_enc($f) ?>"></label></td>
<td><div class="filename"><a href="?p=<?php echo urlencode(trim(FM_PATH . '/' . $f, '/')) ?>"><i class="<?php echo $img ?>"></i> <?php echo fm_enc(fm_convert_win($f)) ?></a><?php echo ($is_link ? ' &rarr; <i>' . fm_enc(readlink($path . '/' . $f)) . '</i>' : '') ?></div></td>
<td>文件夹</td><td><?php echo $modif ?></td>
<?php if (!FM_IS_WIN): ?>
<td><a title="Change Permissions" href="?p=<?php echo urlencode(FM_PATH) ?>&amp;chmod=<?php echo urlencode($f) ?>"><?php echo $perms ?></a></td>
<td><?php echo fm_enc($owner['name'] . ':' . $group['name']) ?></td>
<?php endif; ?>
<td>
<a title="删除" href="?p=<?php echo urlencode(FM_PATH) ?>&amp;del=<?php echo urlencode($f) ?>" onclick="return confirm('删除此文件夹?');"><i class="icon-cross"></i></a>
<a title="重命名" href="#" onclick="rename('<?php echo fm_enc(FM_PATH) ?>', '<?php echo fm_enc($f) ?>');return false;"><i class="icon-rename"></i></a>
<a title="复制" href="?p=&amp;copy=<?php echo urlencode(trim(FM_PATH . '/' . $f, '/')) ?>"><i class="icon-copy"></i></a>
<a title="直接链接" href="<?php echo fm_enc(FM_ROOT_URL . (FM_PATH != '' ? '/' . FM_PATH : '') . '/' . $f . '/') ?>" target="_blank"><i class="icon-chain"></i></a>
</td></tr>
    <?php
    flush();
}

foreach ($files as $f) {
    $is_link = is_link($path . '/' . $f);
    $img = $is_link ? 'icon-link_file' : fm_get_file_icon_class($path . '/' . $f);
    $modif = date(FM_DATETIME_FORMAT, filemtime($path . '/' . $f));
    $filesize_raw = filesize($path . '/' . $f);
    $filesize = fm_get_filesize($filesize_raw);
    $filelink = '?p=' . urlencode(FM_PATH) . '&view=' . urlencode($f);
    $all_files_size += $filesize_raw;
    $perms = substr(decoct(fileperms($path . '/' . $f)), -4);
    if (function_exists('posix_getpwuid') && function_exists('posix_getgrgid')) {
        $owner = posix_getpwuid(fileowner($path . '/' . $f));
        $group = posix_getgrgid(filegroup($path . '/' . $f));
    } else {
        $owner = array('name' => '?');
        $group = array('name' => '?');
    }
    ?>
<tr>
<td><label><input type="checkbox" name="file[]" value="<?php echo fm_enc($f) ?>"></label></td>
<td><div class="filename"><a href="<?php echo fm_enc($filelink) ?>" title="File info"><i class="<?php echo $img ?>"></i> <?php echo fm_enc(fm_convert_win($f)) ?></a><?php echo ($is_link ? ' &rarr; <i>' . fm_enc(readlink($path . '/' . $f)) . '</i>' : '') ?></div></td>
<td><span class="gray" title="<?php printf('%s bytes', $filesize_raw) ?>"><?php echo $filesize ?></span></td>
<td><?php echo $modif ?></td>
<?php if (!FM_IS_WIN): ?>
<td><a title="Change Permissions" href="?p=<?php echo urlencode(FM_PATH) ?>&amp;chmod=<?php echo urlencode($f) ?>"><?php echo $perms ?></a></td>
<td><?php echo fm_enc($owner['name'] . ':' . $group['name']) ?></td>
<?php endif; ?>
<td>
<a title="删除" href="?p=<?php echo urlencode(FM_PATH) ?>&amp;del=<?php echo urlencode($f) ?>" onclick="return confirm('删除此文件?');"><i class="icon-cross"></i></a>
<a title="重命名" href="#" onclick="rename('<?php echo fm_enc(FM_PATH) ?>', '<?php echo fm_enc($f) ?>');return false;"><i class="icon-rename"></i></a>
<a title="复制" href="?p=<?php echo urlencode(FM_PATH) ?>&amp;copy=<?php echo urlencode(trim(FM_PATH . '/' . $f, '/')) ?>"><i class="icon-copy"></i></a>
<a title="直接链接" href="<?php echo fm_enc(FM_ROOT_URL . (FM_PATH != '' ? '/' . FM_PATH : '') . '/' . $f) ?>" target="_blank"><i class="icon-chain"></i></a>
<a title="下载" href="?p=<?php echo urlencode(FM_PATH) ?>&amp;dl=<?php echo urlencode($f) ?>"><i class="icon-download"></i></a>
</td></tr>
    <?php
    flush();
}

if (empty($folders) && empty($files)) {
    ?>
<tr><td></td><td colspan="<?php echo !FM_IS_WIN ? '6' : '4' ?>"><em>该文件夹为空</em></td></tr>
<?php
} else {
    ?>
<tr><td class="gray"></td><td class="gray" colspan="<?php echo !FM_IS_WIN ? '6' : '4' ?>">
完全大小: <span title="<?php printf('%s bytes', $all_files_size) ?>"><?php echo fm_get_filesize($all_files_size) ?></span>,
文件: <?php echo $num_files ?>,
文件夹: <?php echo $num_folders ?>
</td></tr>
<?php
}
?>
</table>
<p class="path"><a href="#" onclick="select_all();return false;"><i class="icon-checkbox"></i> 选择全部</a> &nbsp;
<a href="#" onclick="unselect_all();return false;"><i class="icon-checkbox_uncheck"></i> 取消选择</a> &nbsp;
<a href="#" onclick="invert_all();return false;"><i class="icon-checkbox_invert"></i> 反向选择</a></p>
<p><input class='wmuibutton' type="submit" name="delete" value="删除" onclick="return confirm('要删除指定的文件和文件夹吗?')">
<input class='wmuibutton' type="submit" name="zip" value="压缩" onclick="return confirm('创建压缩文件?')">
<input class='wmuibutton' type="submit" name="copy" value="复制"></p>
</form>

<?php
fm_show_footer();

//--- END

// Functions

/**
 * Delete  file or folder (recursively)
 * @param string $path
 * @return bool
 */
function fm_rdelete($path)
{
    if (is_link($path)) {
        return unlink($path);
    } elseif (is_dir($path)) {
        $objects = scandir($path);
        $ok = true;
        if (is_array($objects)) {
            foreach ($objects as $file) {
                if ($file != '.' && $file != '..') {
                    if (!fm_rdelete($path . '/' . $file)) {
                        $ok = false;
                    }
                }
            }
        }
        return ($ok) ? rmdir($path) : false;
    } elseif (is_file($path)) {
        return unlink($path);
    }
    return false;
}

/**
 * Recursive chmod
 * @param string $path
 * @param int $filemode
 * @param int $dirmode
 * @return bool
 * @todo Will use in mass chmod
 */
function fm_rchmod($path, $filemode, $dirmode)
{
    if (is_dir($path)) {
        if (!chmod($path, $dirmode)) {
            return false;
        }
        $objects = scandir($path);
        if (is_array($objects)) {
            foreach ($objects as $file) {
                if ($file != '.' && $file != '..') {
                    if (!fm_rchmod($path . '/' . $file, $filemode, $dirmode)) {
                        return false;
                    }
                }
            }
        }
        return true;
    } elseif (is_link($path)) {
        return true;
    } elseif (is_file($path)) {
        return chmod($path, $filemode);
    }
    return false;
}

/**
 * Safely rename
 * @param string $old
 * @param string $new
 * @return bool|null
 */
function fm_rename($old, $new)
{
    return (!file_exists($new) && file_exists($old)) ? rename($old, $new) : null;
}

/**
 * Copy file or folder (recursively).
 * @param string $path
 * @param string $dest
 * @param bool $upd Update files
 * @param bool $force Create folder with same names instead file
 * @return bool
 */
function fm_rcopy($path, $dest, $upd = true, $force = true)
{
    if (is_dir($path)) {
        if (!fm_mkdir($dest, $force)) {
            return false;
        }
        $objects = scandir($path);
        $ok = true;
        if (is_array($objects)) {
            foreach ($objects as $file) {
                if ($file != '.' && $file != '..') {
                    if (!fm_rcopy($path . '/' . $file, $dest . '/' . $file)) {
                        $ok = false;
                    }
                }
            }
        }
        return $ok;
    } elseif (is_file($path)) {
        return fm_copy($path, $dest, $upd);
    }
    return false;
}

/**
 * Safely create folder
 * @param string $dir
 * @param bool $force
 * @return bool
 */
function fm_mkdir($dir, $force)
{
    if (file_exists($dir)) {
        if (is_dir($dir)) {
            return $dir;
        } elseif (!$force) {
            return false;
        }
        unlink($dir);
    }
    return mkdir($dir, 0777, true);
}

/**
 * Safely copy file
 * @param string $f1
 * @param string $f2
 * @param bool $upd
 * @return bool
 */
function fm_copy($f1, $f2, $upd)
{
    $time1 = filemtime($f1);
    if (file_exists($f2)) {
        $time2 = filemtime($f2);
        if ($time2 >= $time1 && $upd) {
            return false;
        }
    }
    $ok = copy($f1, $f2);
    if ($ok) {
        touch($f2, $time1);
    }
    return $ok;
}

/**
 * Get mime type
 * @param string $file_path
 * @return mixed|string
 */
function fm_get_mime_type($file_path)
{
    if (function_exists('finfo_open')) {
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mime = finfo_file($finfo, $file_path);
        finfo_close($finfo);
        return $mime;
    } elseif (function_exists('mime_content_type')) {
        return mime_content_type($file_path);
    } elseif (!stristr(ini_get('disable_functions'), 'shell_exec')) {
        $file = escapeshellarg($file_path);
        $mime = shell_exec('file -bi ' . $file);
        return $mime;
    } else {
        return '--';
    }
}

/**
 * HTTP Redirect
 * @param string $url
 * @param int $code
 */
function fm_redirect($url, $code = 302)
{
    header('Location: ' . $url, true, $code);
    exit;
}

/**
 * Clean path
 * @param string $path
 * @return string
 */
function fm_clean_path($path)
{
    $path = trim($path);
    $path = trim($path, '\\/');
    $path = str_replace(array('../', '..\\'), '', $path);
    if ($path == '..') {
        $path = '';
    }
    return str_replace('\\', '/', $path);
}

/**
 * Get parent path
 * @param string $path
 * @return bool|string
 */
function fm_get_parent_path($path)
{
    $path = fm_clean_path($path);
    if ($path != '') {
        $array = explode('/', $path);
        if (count($array) > 1) {
            $array = array_slice($array, 0, -1);
            return implode('/', $array);
        }
        return '';
    }
    return false;
}

/**
 * Get nice filesize
 * @param int $size
 * @return string
 */
function fm_get_filesize($size)
{
    if ($size < 1000) {
        return sprintf('%s B', $size);
    } elseif (($size / 1024) < 1000) {
        return sprintf('%s KiB', round(($size / 1024), 2));
    } elseif (($size / 1024 / 1024) < 1000) {
        return sprintf('%s MiB', round(($size / 1024 / 1024), 2));
    } elseif (($size / 1024 / 1024 / 1024) < 1000) {
        return sprintf('%s GiB', round(($size / 1024 / 1024 / 1024), 2));
    } else {
        return sprintf('%s TiB', round(($size / 1024 / 1024 / 1024 / 1024), 2));
    }
}

/**
 * Get info about zip archive
 * @param string $path
 * @return array|bool
 */
function fm_get_zif_info($path)
{
    if (function_exists('zip_open')) {
        $arch = zip_open($path);
        if ($arch) {
            $filenames = array();
            while ($zip_entry = zip_read($arch)) {
                $zip_name = zip_entry_name($zip_entry);
                $zip_folder = substr($zip_name, -1) == '/';
                $filenames[] = array(
                    'name' => $zip_name,
                    'filesize' => zip_entry_filesize($zip_entry),
                    'compressed_size' => zip_entry_compressedsize($zip_entry),
                    'folder' => $zip_folder
                    //'compression_method' => zip_entry_compressionmethod($zip_entry),
                );
            }
            zip_close($arch);
            return $filenames;
        }
    }
    return false;
}

/**
 * Encode html entities
 * @param string $text
 * @return string
 */
function fm_enc($text)
{
    return htmlspecialchars($text, ENT_QUOTES, 'UTF-8');
}

/**
 * Save message in session
 * @param string $msg
 * @param string $status
 */
function fm_set_msg($msg, $status = 'success')
{
    $_SESSION['message'] = $msg;
    $_SESSION['status'] = $status;
}

/**
 * Check if string is in UTF-8
 * @param string $string
 * @return int
 */
function fm_is_utf8($string)
{
    return preg_match('//u', $string);
}

/**
 * Convert file name to UTF-8 in Windows
 * @param string $filename
 * @return string
 */
function fm_convert_win($filename)
{
    if (FM_IS_WIN && function_exists('iconv')) {
        $filename = iconv(FM_ICONV_INPUT_ENC, 'UTF-8//IGNORE', $filename);
    }
    return $filename;
}

/**
 * Get CSS classname for file
 * @param string $path
 * @return string
 */
function fm_get_file_icon_class($path)
{
    // get extension
    $ext = strtolower(pathinfo($path, PATHINFO_EXTENSION));

    switch ($ext) {
        case 'ico': case 'gif': case 'jpg': case 'jpeg': case 'jpc': case 'jp2':
        case 'jpx': case 'xbm': case 'wbmp': case 'png': case 'bmp': case 'tif':
        case 'tiff':
            $img = 'icon-file_image';
            break;
        case 'txt': case 'css': case 'ini': case 'conf': case 'log': case 'htaccess':
        case 'passwd': case 'ftpquota': case 'sql': case 'js': case 'json': case 'sh':
        case 'config': case 'twig': case 'tpl': case 'md': case 'gitignore':
        case 'less': case 'sass': case 'scss': case 'c': case 'cpp': case 'cs': case 'py':
        case 'map': case 'lock': case 'dtd':
            $img = 'icon-file_text';
            break;
        case 'zip': case 'rar': case 'gz': case 'tar': case '7z':
            $img = 'icon-file_zip';
            break;
        case 'php': case 'php4': case 'php5': case 'phps': case 'phtml':
            $img = 'icon-file_php';
            break;
        case 'htm': case 'html': case 'shtml': case 'xhtml':
            $img = 'icon-file_html';
            break;
        case 'xml': case 'xsl': case 'svg':
            $img = 'icon-file_code';
            break;
        case 'wav': case 'mp3': case 'mp2': case 'm4a': case 'aac': case 'ogg':
        case 'oga': case 'wma': case 'mka': case 'flac': case 'ac3': case 'tds':
            $img = 'icon-file_music';
            break;
        case 'm3u': case 'm3u8': case 'pls': case 'cue':
            $img = 'icon-file_playlist';
            break;
        case 'avi': case 'mpg': case 'mpeg': case 'mp4': case 'm4v': case 'flv':
        case 'f4v': case 'ogm': case 'ogv': case 'mov': case 'mkv': case '3gp':
        case 'asf': case 'wmv':
            $img = 'icon-file_film';
            break;
        case 'eml': case 'msg':
            $img = 'icon-file_outlook';
            break;
        case 'xls': case 'xlsx':
            $img = 'icon-file_excel';
            break;
        case 'csv':
            $img = 'icon-file_csv';
            break;
        case 'doc': case 'docx':
            $img = 'icon-file_word';
            break;
        case 'ppt': case 'pptx':
            $img = 'icon-file_powerpoint';
            break;
        case 'ttf': case 'ttc': case 'otf': case 'woff':case 'woff2': case 'eot': case 'fon':
            $img = 'icon-file_font';
            break;
        case 'pdf':
            $img = 'icon-file_pdf';
            break;
        case 'psd':
            $img = 'icon-file_photoshop';
            break;
        case 'ai': case 'eps':
            $img = 'icon-file_illustrator';
            break;
        case 'fla':
            $img = 'icon-file_flash';
            break;
        case 'swf':
            $img = 'icon-file_swf';
            break;
        case 'exe': case 'msi':
            $img = 'icon-file_application';
            break;
        case 'bat':
            $img = 'icon-file_terminal';
            break;
        default:
            $img = 'icon-document';
    }

    return $img;
}

/**
 * Get image files extensions
 * @return array
 */
function fm_get_image_exts()
{
    return array('ico', 'gif', 'jpg', 'jpeg', 'jpc', 'jp2', 'jpx', 'xbm', 'wbmp', 'png', 'bmp', 'tif', 'tiff', 'psd');
}

/**
 * Get video files extensions
 * @return array
 */
function fm_get_video_exts()
{
    return array('webm', 'mp4', 'm4v', 'ogm', 'ogv', 'mov');
}

/**
 * Get audio files extensions
 * @return array
 */
function fm_get_audio_exts()
{
    return array('wav', 'mp3', 'ogg', 'm4a');
}

/**
 * Get text file extensions
 * @return array
 */
function fm_get_text_exts()
{
    return array(
        'txt', 'css', 'ini', 'conf', 'log', 'htaccess', 'passwd', 'ftpquota', 'sql', 'js', 'json', 'sh', 'config',
        'php', 'php4', 'php5', 'phps', 'phtml', 'htm', 'html', 'shtml', 'xhtml', 'xml', 'xsl', 'm3u', 'm3u8', 'pls', 'cue',
        'eml', 'msg', 'csv', 'bat', 'twig', 'tpl', 'md', 'gitignore', 'less', 'sass', 'scss', 'c', 'cpp', 'cs', 'py',
        'map', 'lock', 'dtd', 'svg',
    );
}

/**
 * Get mime types of text files
 * @return array
 */
function fm_get_text_mimes()
{
    return array(
        'application/xml',
        'application/javascript',
        'application/x-javascript',
        'image/svg+xml',
        'message/rfc822',
    );
}

/**
 * Get file names of text files w/o extensions
 * @return array
 */
function fm_get_text_names()
{
    return array(
        'license',
        'readme',
        'authors',
        'contributors',
        'changelog',
    );
}

/**
 * Class to work with zip files (using ZipArchive)
 */
class FM_Zipper
{
    private $zip;

    public function __construct()
    {
        $this->zip = new ZipArchive();
    }

    /**
     * Create archive with name $filename and files $files (RELATIVE PATHS!)
     * @param string $filename
     * @param array|string $files
     * @return bool
     */
    public function create($filename, $files)
    {
        $res = $this->zip->open($filename, ZipArchive::CREATE);
        if ($res !== true) {
            return false;
        }
        if (is_array($files)) {
            foreach ($files as $f) {
                if (!$this->addFileOrDir($f)) {
                    $this->zip->close();
                    return false;
                }
            }
            $this->zip->close();
            return true;
        } else {
            if ($this->addFileOrDir($files)) {
                $this->zip->close();
                return true;
            }
            return false;
        }
    }

    /**
     * Extract archive $filename to folder $path (RELATIVE OR ABSOLUTE PATHS)
     * @param string $filename
     * @param string $path
     * @return bool
     */
    public function unzip($filename, $path)
    {
        $res = $this->zip->open($filename);
        if ($res !== true) {
            return false;
        }
        if ($this->zip->extractTo($path)) {
            $this->zip->close();
            return true;
        }
        return false;
    }

    /**
     * Add file/folder to archive
     * @param string $filename
     * @return bool
     */
    private function addFileOrDir($filename)
    {
        if (is_file($filename)) {
            return $this->zip->addFile($filename);
        } elseif (is_dir($filename)) {
            return $this->addDir($filename);
        }
        return false;
    }

    /**
     * Add folder recursively
     * @param string $path
     * @return bool
     */
    private function addDir($path)
    {
        if (!$this->zip->addEmptyDir($path)) {
            return false;
        }
        $objects = scandir($path);
        if (is_array($objects)) {
            foreach ($objects as $file) {
                if ($file != '.' && $file != '..') {
                    if (is_dir($path . '/' . $file)) {
                        if (!$this->addDir($path . '/' . $file)) {
                            return false;
                        }
                    } elseif (is_file($path . '/' . $file)) {
                        if (!$this->zip->addFile($path . '/' . $file)) {
                            return false;
                        }
                    }
                }
            }
            return true;
        }
        return false;
    }
}

//--- templates functions

/**
 * Show nav block
 * @param string $path
 */
function fm_show_nav_path($path)
{
    ?>
<div class="path">
<div class="float-right">
<a title="上传文件" href="?p=<?php echo urlencode(FM_PATH) ?>&amp;upload"><i class="icon-upload"></i></a>
<a title="新文件夹" href="#" onclick="newfolder('<?php echo fm_enc(FM_PATH) ?>');return false;"><i class="icon-folder_add"></i></a>
<?php if (FM_USE_AUTH): ?><a title="注销登录" href="?logout=1"><i class="icon-logout"></i></a><?php endif; ?>
</div>
        <?php
        $path = fm_clean_path($path);
        $root_url = "<a href='?p='><i class='icon-home' title='" . FM_ROOT_PATH . "'></i></a>";
        $sep = '<i class="icon-separator"></i>';
        if ($path != '') {
            $exploded = explode('/', $path);
            $count = count($exploded);
            $array = array();
            $parent = '';
            for ($i = 0; $i < $count; $i++) {
                $parent = trim($parent . '/' . $exploded[$i], '/');
                $parent_enc = urlencode($parent);
                $array[] = "<a href='?p={$parent_enc}'>" . fm_enc(fm_convert_win($exploded[$i])) . "</a>";
            }
            $root_url .= $sep . implode($sep, $array);
        }
        echo '<div class="break-word">' . $root_url . '</div>';
        ?>
</div>
<?php
}

/**
 * Show message from session
 */
function fm_show_message()
{
    echo "<script src='$wmsys_sysroot/main/js/jquery-3.4.1.min.js'></script>";
    echo "<script src='$wmsys_sysroot/main/js/wmui.js'></script>";
    if (isset($_SESSION['message'])) {
        $class = isset($_SESSION['status']) ? $_SESSION['status'] : 'success';
        echo "<div class='wmuinotify-container'></div>";
        echo "<script>notify.$class('文件资源管理器', '" . $_SESSION['message'] . "',10);</script>";
        unset($_SESSION['message']);
        unset($_SESSION['status']);
    }
}

/**
 * Show page header
 */
function fm_show_header()
{
    $sprites_ver = '20160315';
    header("Content-Type: text/html; charset=utf-8");
    header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
    header("Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0");
    header("Pragma: no-cache");
    ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<style>
/*html,body,div,span,p,pre,a,code,em,img,small,strong,ol,ul,li,form,label,table,tr,th,td{margin:0;padding:0;vertical-align:baseline;outline:none;font-size:100%;background:transparent;border:none;text-decoration:none}
html{overflow-y:scroll}body{padding:0;font:13px/16px Tahoma,Arial,sans-serif;color:#222;background:#efefef}
input,select,textarea,button{font-size:inherit;font-family:inherit}
a{color:#296ea3;text-decoration:none}a:hover{color:#b00}img{vertical-align:middle;border:none}
a img{border:none}span.gray{color:#777}small{font-size:11px;color:#999}p{margin-bottom:10px}
ul{margin-left:2em;margin-bottom:10px}ul{list-style-type:none;margin-left:0}ul li{padding:3px 0}
table{border-collapse:collapse;border-spacing:0;margin-bottom:10px;width:100%}
th,td{padding:4px 7px;text-align:left;vertical-align:top;border:1px solid #ddd;background:#fff;white-space:nowrap}
th,td.gray{background-color:#eee}td.gray span{color:#222}
tr:hover td{background-color:#f5f5f5}tr:hover td.gray{background-color:#eee}*/
code,pre{display:block;margin-bottom:10px;font:13px/16px Consolas,'Courier New',Courier,monospace;border:1px dashed #ccc;padding:5px;overflow:auto}
pre.with-hljs{padding:0}
pre.with-hljs code{margin:0;border:0;overflow:visible}
code.maxheight,pre.maxheight{max-height:512px}input[type="checkbox"]{margin:0;padding:0}
#wrapper{max-width:1000px;min-width:400px;margin:10px auto}
.path{padding:4px 7px;border:1px solid #ddd;background-color:#fff;margin-bottom:10px}
.right{text-align:right}.center{text-align:center}.float-right{float:right}
.message{padding:4px 7px;border:1px solid #ddd;background-color:#fff}
.message.ok{border-color:green;color:green}
.message.error{border-color:red;color:red}
.message.alert{border-color:orange;color:orange}
.btn{border:0;background:none;padding:0;margin:0;font-weight:bold;color:#296ea3;cursor:pointer}.btn:hover{color:#b00}
.preview-img{max-width:100%;background:url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAIAAACQkWg2AAAAKklEQVR42mL5//8/Azbw+PFjrOJMDCSCUQ3EABZc4S0rKzsaSvTTABBgAMyfCMsY4B9iAAAAAElFTkSuQmCC") repeat 0 0}
.preview-video{position:relative;max-width:100%;height:0;padding-bottom:62.5%;margin-bottom:10px}.preview-video video{position:absolute;width:100%;height:100%;left:0;top:0;background:#000}
[class*="icon-"]{display:inline-block;width:16px;height:16px;background:url("<?php echo FM_SELF_URL ?>?img=sprites&amp;t=<?php echo $sprites_ver ?>") no-repeat 0 0;vertical-align:bottom}
.icon-document{background-position:-16px 0}.icon-folder{background-position:-32px 0}
.icon-folder_add{background-position:-48px 0}.icon-upload{background-position:-64px 0}
.icon-arrow_up{background-position:-80px 0}.icon-home{background-position:-96px 0}
.icon-separator{background-position:-112px 0}.icon-cross{background-position:-128px 0}
.icon-copy{background-position:-144px 0}.icon-apply{background-position:-160px 0}
.icon-cancel{background-position:-176px 0}.icon-rename{background-position:-192px 0}
.icon-checkbox{background-position:-208px 0}.icon-checkbox_invert{background-position:-224px 0}
.icon-checkbox_uncheck{background-position:-240px 0}.icon-download{background-position:-256px 0}
.icon-goback{background-position:-272px 0}.icon-folder_open{background-position:-288px 0}
.icon-file_application{background-position:0 -16px}.icon-file_code{background-position:-16px -16px}
.icon-file_csv{background-position:-32px -16px}.icon-file_excel{background-position:-48px -16px}
.icon-file_film{background-position:-64px -16px}.icon-file_flash{background-position:-80px -16px}
.icon-file_font{background-position:-96px -16px}.icon-file_html{background-position:-112px -16px}
.icon-file_illustrator{background-position:-128px -16px}.icon-file_image{background-position:-144px -16px}
.icon-file_music{background-position:-160px -16px}.icon-file_outlook{background-position:-176px -16px}
.icon-file_pdf{background-position:-192px -16px}.icon-file_photoshop{background-position:-208px -16px}
.icon-file_php{background-position:-224px -16px}.icon-file_playlist{background-position:-240px -16px}
.icon-file_powerpoint{background-position:-256px -16px}.icon-file_swf{background-position:-272px -16px}
.icon-file_terminal{background-position:-288px -16px}.icon-file_text{background-position:-304px -16px}
.icon-file_word{background-position:-320px -16px}.icon-file_zip{background-position:-336px -16px}
.icon-logout{background-position:-304px 0}.icon-chain{background-position:-320px 0}
.icon-link_folder{background-position:-352px -16px}.icon-link_file{background-position:-368px -16px}
.compact-table{border:0;width:auto}.compact-table td,.compact-table th{width:100px;border:0;text-align:center}.compact-table tr:hover td{background-color:#fff}
.filename{max-width:420px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis}
.break-word{word-wrap:break-word}
</style>
<link rel="icon" href="<?php echo FM_SELF_URL ?>?img=favicon" type="image/png">
<link rel="shortcut icon" href="<?php echo FM_SELF_URL ?>?img=favicon" type="image/png">
<?php if (isset($_GET['view']) && FM_USE_HIGHLIGHTJS): ?>
<!--link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.2.0/styles/<?php echo FM_HIGHLIGHTJS_STYLE ?>.min.css"-->
<?php endif; ?>
</head>
<body>
<div id="wrapper">
<?php
}

/**
 * Show page footer
 */
function fm_show_footer()
{
    include('../config.php');
    $wmui_jumpoffheadbar = 1;
    $wmui_jumpoffbottombar = 0;
    $wmui_title = "文件资源管理器 - " . $wmsys_name;
    $wmui_backpath = "../";
    include('../wmui/wmui.php');
    ?>
<div class="single-bg"></div>
</div>
<script>
function newfolder(p){var n=prompt('新文件夹名称','文件夹');if(n!==null&&n!==''){window.location.search='p='+encodeURIComponent(p)+'&new='+encodeURIComponent(n);}}
function rename(p,f){var n=prompt('新名称',f);if(n!==null&&n!==''&&n!=f){window.location.search='p='+encodeURIComponent(p)+'&ren='+encodeURIComponent(f)+'&to='+encodeURIComponent(n);}}
function change_checkboxes(l,v){for(var i=l.length-1;i>=0;i--){l[i].checked=(typeof v==='boolean')?v:!l[i].checked;}}
function get_checkboxes(){var i=document.getElementsByName('file[]'),a=[];for(var j=i.length-1;j>=0;j--){if(i[j].type='checkbox'){a.push(i[j]);}}return a;}
function select_all(){var l=get_checkboxes();change_checkboxes(l,true);}
function unselect_all(){var l=get_checkboxes();change_checkboxes(l,false);}
function invert_all(){var l=get_checkboxes();change_checkboxes(l);}
function checkbox_toggle(){var l=get_checkboxes();l.push(this);change_checkboxes(l);}
</script>
<?php if (isset($_GET['view']) && FM_USE_HIGHLIGHTJS): ?>
<!--script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.2.0/highlight.min.js"></script-->
<script>hljs.initHighlightingOnLoad();</script>
<?php endif; ?>
</body>
</html>
<?php
}

/**
 * Show image
 * @param string $img
 */
function fm_show_image($img)
{
    $modified_time = gmdate('D, Y M d 00:00:00') . ' GMT';
    $expires_time = gmdate('D, Y M d 00:00:00', strtotime('+1 day')) . ' GMT';

    $img = trim($img);
    $images = fm_get_images();
    $image = 'iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAEElEQVR42mL4//8/A0CAAQAI/AL+26JNFgAAAABJRU5ErkJggg==';
    if (isset($images[$img])) {
        $image = $images[$img];
    }
    $image = base64_decode($image);
    if (function_exists('mb_strlen')) {
        $size = mb_strlen($image, '8bit');
    } else {
        $size = strlen($image);
    }

    if (function_exists('header_remove')) {
        header_remove('Cache-Control');
        header_remove('Pragma');
    } else {
        header('Cache-Control:');
        header('Pragma:');
    }

    header('Last-Modified: ' . $modified_time, true, 200);
    header('Expires: ' . $expires_time);
    header('Content-Length: ' . $size);
    header('Content-Type: image/png');
    echo $image;

    exit;
}

/**
 * Get base64-encoded images
 * @return array
 */
function fm_get_images()
{
    return array(
        'favicon' => 'iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJ
bWFnZVJlYWR5ccllPAAAAZVJREFUeNqkk79Lw0AUx1+uidTQim4Waxfpnl1BcHMR6uLkIF0cpYOI
f4KbOFcRwbGTc0HQSVQQXCqlFIXgFkhIyvWS870LaaPYH9CDy8vdfb+fey930aSUMEvT6VHVzw8x
rKUX3N3Hj/8M+cZ6GcOtBPl6KY5iAA7KJzfVWrfbhUKhALZtQ6myDf1+X5nsuzjLUmUOnpa+v5r1
Z4ZDDfsLiwER45xDEATgOI6KntfDd091GidzC8vZ4vH1QQ09+4MSMAMWRREKPMhmsyr6voYmrnb2
PKEizdEabUaeFCDKCCHAdV0wTVNFznMgpVqGlZ2cipzHGtKSZwCIZJgJwxB38KHT6Sjx21V75Jcn
LXmGAKTRpGVZUx2dAqQzSEqw9kqwuGqONTufPrw37D8lQFxCvjgPXIixANLEGfwuQacMOC4kZz+q
GdhJS550BjpRCdCbAJCMJRkMASEIg+4Bxz4JwAwDSEueAYDLIM+QrOk6GHiRxjXSkJY8KUCvdXZ6
kbuvNx+mOcbN9taGBlpLAWf9nX8EGADoCfqkKWV/cgAAAABJRU5ErkJggg==',
        'sprites' => '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
        AElFTkSuQmCC',
    );
}
