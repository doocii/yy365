<?php
/**
 * WordPress基础配置文件。
 *
 * 这个文件被安装程序用于自动生成wp-config.php配置文件，
 * 您可以不使用网站，您需要手动复制这个文件，
 * 并重命名为“wp-config.php”，然后填入相关信息。
 *
 * 本文件包含以下配置选项：
 *
 * * MySQL设置
 * * 密钥
 * * 数据库表名前缀
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/zh-cn:%E7%BC%96%E8%BE%91_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL 设置 - 具体信息来自您正在使用的主机 ** //
/** WordPress数据库的名称 */
define('DB_NAME', 'yy365');

/** MySQL数据库用户名 */
define('DB_USER', 'root');

/** MySQL数据库密码 */
define('DB_PASSWORD', '123456');

/** MySQL主机 */
define('DB_HOST', 'localhost');

/** 创建数据表时默认的文字编码 */
define('DB_CHARSET', 'utf8mb4');

/** 数据库整理类型。如不确定请勿更改 */
define('DB_COLLATE', '');

/**#@+
 * 身份认证密钥与盐。
 *
 * 修改为任意独一无二的字串！
 * 或者直接访问{@link https://api.wordpress.org/secret-key/1.1/salt/
 * WordPress.org密钥生成服务}
 * 任何修改都会导致所有cookies失效，所有用户将必须重新登录。
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'u#;ZpMe:y*L@MV[E=aV4SC1E@PJ@;-pK9^879~E:;HZD<[FQ{1?s|1(-3x(Pngds');
define('SECURE_AUTH_KEY',  'Ct: Mrm5<QW>uxUm`l1-Rw%tq$vgC5U,^(VlP#V53k7}XE Zj}~o`H3Hu%`{8Fa$');
define('LOGGED_IN_KEY',    'c/&ump!ITP:.I7uh mTp(LBB<=mlXt9zQ6Vt{c^A-;BUtR#jQ=;0eeqCmWx5;|aw');
define('NONCE_KEY',        'T#>H?u5Xgkc>lh%u>sOtJ9^B5HU~Z%Ea7F?SHiOpB>1;/quVM3$a=QzjV.BB`,RQ');
define('AUTH_SALT',        'HL5ZnEb.1<u2/yxFn^!RCZU4{et>sDS&5I;KS6)gRZ<+~S[fWn5427 r<-L5N  J');
define('SECURE_AUTH_SALT', '3?^j6q+(@jxX[kTK;4r!{O5]_NnnJ{wp HUiRwO>#StL9tZaFIxS|U^%Z(>?;<2U');
define('LOGGED_IN_SALT',   'Ls1)>i9H.Q%E/7XG[>mp2[DVKE3tXxN|s`4M=u5^Wv?uqZpA*818+)y%ZPB5O:RB');
define('NONCE_SALT',       '(85-I^,c_GcR@He>IGW8O}.(Ojv;|3$[e%ne1aKplzV}KLjI;b%(U0FEnf4csUKj');

/**#@-*/

/**
 * WordPress数据表前缀。
 *
 * 如果您有在同一数据库内安装多个WordPress的需求，请为每个WordPress设置
 * 不同的数据表前缀。前缀名只能为数字、字母加下划线。
 */
$table_prefix  = 'yy_';

/**
 * 开发者专用：WordPress调试模式。
 *
 * 将这个值改为true，WordPress将显示所有用于开发的提示。
 * 强烈建议插件开发者在开发环境中启用WP_DEBUG。
 *
 * 要获取其他能用于调试的信息，请访问Codex。
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/**
 * zh_CN本地化设置：启用ICP备案号显示
 *
 * 可在设置→常规中修改。
 * 如需禁用，请移除或注释掉本行。
 */
define('WP_ZH_CN_ICP_NUM', true);

/* 好了！请不要再继续编辑。请保存本文件。使用愉快！ */

/** WordPress目录的绝对路径。 */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** 设置WordPress变量和包含文件。 */
require_once(ABSPATH . 'wp-settings.php');
