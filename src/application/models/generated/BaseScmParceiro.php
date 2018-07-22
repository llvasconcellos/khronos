<?php

/**
 * BaseScmParceiro
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $nm_parceiro
 * @property integer $id_empresa
 * @property ScmEmpresa $ScmEmpresa
 * @property Doctrine_Collection $ScmFechamentoDoc
 * @property Doctrine_Collection $ScmHistoricoStatus
 * @property Doctrine_Collection $ScmMaquina
 * @property Doctrine_Collection $ScmMovimentacaoDoc
 * @property Doctrine_Collection $ScmRegularizacaoDoc
 * @property Doctrine_Collection $ScmTransformacaoDoc
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 6401 2009-09-24 16:12:04Z guilhermeblanco $
 */
abstract class BaseScmParceiro extends Doctrine_Record
{
    public function setTableDefinition()
    {
        $this->setTableName('scm_parceiro');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'unsigned' => 0,
             'primary' => true,
             'autoincrement' => true,
             'length' => '4',
             ));
        $this->hasColumn('nm_parceiro', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => '255',
             ));
        $this->hasColumn('id_empresa', 'integer', 4, array(
             'type' => 'integer',
             'unsigned' => 0,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => '4',
             ));
    }

    public function setUp()
    {
        parent::setUp();
    $this->hasOne('ScmEmpresa', array(
             'local' => 'id_empresa',
             'foreign' => 'id'));

        $this->hasMany('ScmFechamentoDoc', array(
             'local' => 'id',
             'foreign' => 'id_parceiro'));

        $this->hasMany('ScmHistoricoStatus', array(
             'local' => 'id',
             'foreign' => 'id_parceiro'));

        $this->hasMany('ScmMaquina', array(
             'local' => 'id',
             'foreign' => 'id_parceiro'));

        $this->hasMany('ScmMovimentacaoDoc', array(
             'local' => 'id',
             'foreign' => 'id_parceiro'));

        $this->hasMany('ScmRegularizacaoDoc', array(
             'local' => 'id',
             'foreign' => 'id_parceiro'));

        $this->hasMany('ScmTransformacaoDoc', array(
             'local' => 'id',
             'foreign' => 'id_parceiro'));
    }
}