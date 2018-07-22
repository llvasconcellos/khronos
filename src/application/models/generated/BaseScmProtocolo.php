<?php

/**
 * BaseScmProtocolo
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $nm_protocolo
 * @property Doctrine_Collection $ScmLocalServer
 * @property Doctrine_Collection $ScmMaquina
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 6401 2009-09-24 16:12:04Z guilhermeblanco $
 */
abstract class BaseScmProtocolo extends Doctrine_Record
{
    public function setTableDefinition()
    {
        $this->setTableName('scm_protocolo');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'unsigned' => 0,
             'primary' => true,
             'autoincrement' => true,
             'length' => '4',
             ));
        $this->hasColumn('nm_protocolo', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => '255',
             ));
    }

    public function setUp()
    {
        parent::setUp();
    $this->hasMany('ScmLocalServer', array(
             'local' => 'id',
             'foreign' => 'id_protocolo'));

        $this->hasMany('ScmMaquina', array(
             'local' => 'id',
             'foreign' => 'id_protocolo'));
    }
}