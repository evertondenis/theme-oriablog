<?php
/** 
 * As configurações básicas do WordPress.
 *
 * Esse arquivo contém as seguintes configurações: configurações de MySQL, Prefixo de Tabelas,
 * Chaves secretas, Idioma do WordPress, e ABSPATH. Você pode encontrar mais informações
 * visitando {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. Você pode obter as configurações de MySQL de seu servidor de hospedagem.
 *
 * Esse arquivo é usado pelo script ed criação wp-config.php durante a
 * instalação. Você não precisa usar o site, você pode apenas salvar esse arquivo
 * como "wp-config.php" e preencher os valores.
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar essas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define('DB_NAME', 'blog_oria');

/** Usuário do banco de dados MySQL */
define('DB_USER', 'root');

/** Senha do banco de dados MySQL */
define('DB_PASSWORD', '');

/** nome do host do MySQL */
define('DB_HOST', 'localhost');

/** Conjunto de caracteres do banco de dados a ser usado na criação das tabelas. */
define('DB_CHARSET', 'utf8mb4');

/** O tipo de collate do banco de dados. Não altere isso se tiver dúvidas. */
define('DB_COLLATE', '');

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * Você pode alterá-las a qualquer momento para desvalidar quaisquer cookies existentes. Isto irá forçar todos os usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'K[ZQ#x1 9VFh9O7aIq{NeqYkE|V:8c#h9P~1X/:Z[E1Oythu<7a`@Na%#PmMfn?V');
define('SECURE_AUTH_KEY',  '8KY-Pj7^;aI:/Tg8_CwhPvh*u7IyGHh($DVUf.N-Fi<wW)r3L@Z*aY:/SnH6S!jR');
define('LOGGED_IN_KEY',    'y!s%nk%rxzAzU] ]1pjtQnY=4wE]qe_DWnkJo{Ua^Kt,;8?x0B4WPW#epX|J}2S<');
define('NONCE_KEY',        'Ml$@w[HN/|Qfj9<#RZ?iYdlAACBin0vrL=yXVd57Lr>:H+iTihJ?[xn(P(+tfRd<');
define('AUTH_SALT',        '>&ch$jjvtJC-EAR4+8Z]GM..ztc69N8P%u?}=E^PYwQ&K?z}`9EZjOE/=P.u$3D}');
define('SECURE_AUTH_SALT', ':CFe,.KK(ZE2mSRD4,]]R7;{*@f%Q89F lIkE1)x?9l?j#<K-kSn>R@6&nfW}RxM');
define('LOGGED_IN_SALT',   '7gU#7^e>nd9_&Y nlTnS-UYzAu(M%xHf5HOT{i]$?hFu&#la;ad!KATSo0yOCUc%');
define('NONCE_SALT',       'N!0Ya0n{1{jpE6]j=8u>K,,_WN2$q^,qzQS.!w2tU{aRZb$L#5m@wa!Ux}+1O[.D');

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der para cada um um único
 * prefixo. Somente números, letras e sublinhados!
 */
$table_prefix  = 'wp_';


/**
 * Para desenvolvedores: Modo debugging WordPress.
 *
 * altere isto para true para ativar a exibição de avisos durante o desenvolvimento.
 * é altamente recomendável que os desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 */
define('WP_DEBUG', false);

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
	
/** Configura as variáveis do WordPress e arquivos inclusos. */
require_once(ABSPATH . 'wp-settings.php');
