<?php

/**
 * BaseScmGabinete
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $nm_gabinete
 * @property Doctrine_Collection $ScmMaquina
 * @property Doctrine_Collection $ScmTransformacaoItem
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 6401 2009-09-24 16:12:04Z guilhermeblanco $
 */
abstract class BaseScmGabinete extends Doctrine_Record
{
    public function setTableDefinition()
    {
        $this->setTableName('scm_gabinete');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'unsigned' => 0,
             'primary' => true,
             'autoincrement' => true,
             'length' => '4',
             ));
        $this->hasColumn('nm_gabinete', 'string', 45, array(
             'type' => 'string',
             'fixed' => 0,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => '45',
             ));
    }

    public function setUp()
    {
        parent::setUp();
    $this->hasMany('ScmMaquina', array(
             'local' => 'id',
             'foreign' => 'id_gabinete'));

        $this->hasMany('ScmTransformacaoItem', array(
             'local' => 'id',
             'foreign' => 'id_gabinete'));
    }
}