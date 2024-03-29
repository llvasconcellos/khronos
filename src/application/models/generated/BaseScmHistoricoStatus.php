<?php

/**
 * BaseScmHistoricoStatus
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property timestamp $dt_status
 * @property integer $id_status
 * @property integer $id_maquina
 * @property integer $id_filial
 * @property integer $id_local
 * @property integer $id_parceiro
 * @property integer $id_usuario
 * @property timestamp $dt_sistema
 * @property ScmUser $ScmUser
 * @property ScmMaquina $ScmMaquina
 * @property ScmFilial $ScmFilial
 * @property ScmLocal $ScmLocal
 * @property ScmParceiro $ScmParceiro
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 6401 2009-09-24 16:12:04Z guilhermeblanco $
 */
abstract class BaseScmHistoricoStatus extends Doctrine_Record
{
    public function setTableDefinition()
    {
        $this->setTableName('scm_historico_status');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'unsigned' => 0,
             'primary' => true,
             'autoincrement' => true,
             'length' => '4',
             ));
        $this->hasColumn('dt_status', 'timestamp', null, array(
             'type' => 'timestamp',
             'notnull' => true,
             ));
        $this->hasColumn('id_status', 'integer', 4, array(
             'type' => 'integer',
             'unsigned' => 0,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => '4',
             ));
        $this->hasColumn('id_maquina', 'integer', 4, array(
             'type' => 'integer',
             'unsigned' => 0,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => '4',
             ));
        $this->hasColumn('id_filial', 'integer', 4, array(
             'type' => 'integer',
             'unsigned' => 0,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => '4',
             ));
        $this->hasColumn('id_local', 'integer', 4, array(
             'type' => 'integer',
             'unsigned' => 0,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => '4',
             ));
        $this->hasColumn('id_parceiro', 'integer', 4, array(
             'type' => 'integer',
             'unsigned' => 0,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => '4',
             ));
        $this->hasColumn('id_usuario', 'integer', 4, array(
             'type' => 'integer',
             'unsigned' => 0,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => '4',
             ));
        $this->hasColumn('dt_sistema', 'timestamp', null, array(
             'type' => 'timestamp',
             'notnull' => true,
             ));
    }

    public function setUp()
    {
        parent::setUp();
    $this->hasOne('ScmUser', array(
             'local' => 'id',
             'foreign' => 'id'));

        $this->hasOne('ScmMaquina', array(
             'local' => 'id_maquina',
             'foreign' => 'id'));

        $this->hasOne('ScmFilial', array(
             'local' => 'id_filial',
             'foreign' => 'id'));

        $this->hasOne('ScmLocal', array(
             'local' => 'id_local',
             'foreign' => 'id'));

        $this->hasOne('ScmParceiro', array(
             'local' => 'id_parceiro',
             'foreign' => 'id'));
    }
}