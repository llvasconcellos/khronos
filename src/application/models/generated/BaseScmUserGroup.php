<?php

/**
 * BaseScmUserGroup
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $user_id
 * @property integer $group_id
 * @property ScmGroup $ScmGroup
 * @property ScmUser $ScmUser
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 6401 2009-09-24 16:12:04Z guilhermeblanco $
 */
abstract class BaseScmUserGroup extends Doctrine_Record
{
    public function setTableDefinition()
    {
        $this->setTableName('scm_user_group');
        $this->hasColumn('user_id', 'integer', 4, array(
             'type' => 'integer',
             'unsigned' => '1',
             'primary' => true,
             'autoincrement' => false,
             'length' => '4',
             ));
        $this->hasColumn('group_id', 'integer', 4, array(
             'type' => 'integer',
             'unsigned' => '1',
             'primary' => true,
             'autoincrement' => false,
             'length' => '4',
             ));

        $this->option('collate', 'utf8_unicode_ci');
        $this->option('charset', 'utf8');
    }

    public function setUp()
    {
        parent::setUp();
    $this->hasOne('ScmGroup', array(
             'local' => 'group_id',
             'foreign' => 'id'));

        $this->hasOne('ScmUser', array(
             'local' => 'user_id',
             'foreign' => 'id'));
    }
}