<?php

/*
 * i-Educar - Sistema de gest�o escolar
 *
 * Copyright (C) 2006  Prefeitura Municipal de Itaja�
 *                     <ctima@itajai.sc.gov.br>
 *
 * Este programa � software livre; voc� pode redistribu�-lo e/ou modific�-lo
 * sob os termos da Licen�a P�blica Geral GNU conforme publicada pela Free
 * Software Foundation; tanto a vers�o 2 da Licen�a, como (a seu crit�rio)
 * qualquer vers�o posterior.
 *
 * Este programa � distribu��do na expectativa de que seja �til, por�m, SEM
 * NENHUMA GARANTIA; nem mesmo a garantia impl��cita de COMERCIABILIDADE OU
 * ADEQUA��O A UMA FINALIDADE ESPEC�FICA. Consulte a Licen�a P�blica Geral
 * do GNU para mais detalhes.
 *
 * Voc� deve ter recebido uma c�pia da Licen�a P�blica Geral do GNU junto
 * com este programa; se n�o, escreva para a Free Software Foundation, Inc., no
 * endere�o 59 Temple Street, Suite 330, Boston, MA 02111-1307 USA.
 */

/**
 * @author   Eriksen Costa Paix�o <eriksen.paixao_bs@cobra.com.br>
 * @license  http://creativecommons.org/licenses/GPL/2.0/legalcode.pt  CC GNU GPL
 * @package  CoreExt
 * @since    Arquivo dispon�vel desde a vers�o 1.0.0
 * @version  $Id$
 */


/*
 * Verifica se o PHP instalado � maior ou igual a 5.2.0
 */
if (! version_compare('5.2.0', PHP_VERSION, '<=')) {
  die('O i-Educar requer o PHP na vers�o 5.2. A vers�o instalada de seu PHP (' . PHP_VERSION . ') n�o � suportada.');
}


/*
 * Altera o include_path, adicionando o caminho a CoreExt, tornando mais
 * simples o uso de require e include para as novas classes.
 */
$coreExt = realpath(dirname(__FILE__) . '/../') . '/lib';
set_include_path($coreExt . PATH_SEPARATOR . get_include_path());

/*
 * Define o ambiente de configura��o desejado. Verifica se existe uma vari�vel
 * de ambiente configurada ou define 'production' como padr�o.
 */
defined('CORE_EXT_CONFIGURATION_ENV') ||
  define('CORE_EXT_CONFIGURATION_ENV', 'development');

// Arquivo de configura��o INI
$configFile = realpath(dirname(__FILE__) . '/../') . '/configuration/ieducar.ini';

// Classe de configura��o
require_once 'CoreExt/Config.class.php';
require_once 'CoreExt/Config/Ini.class.php';


// Array global de objetos de classes do pacote CoreExt
global $coreExt;
$coreExt = array();

// Instancia objeto CoreExt_Configuration
$coreExt['Config'] = new CoreExt_Config_Ini($configFile, CORE_EXT_CONFIGURATION_ENV);

// Instancia objeto CoreExt_Configuration_PHP e configura o PHP
#$coreExt['Configuration_PHP'] = new CoreExt_Configuration_PHP($coreExt['Configuration']);