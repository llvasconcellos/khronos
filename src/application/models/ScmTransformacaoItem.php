<?php

/**
 * ScmTransformacaoItem
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 6401 2009-09-24 16:12:04Z guilhermeblanco $
 */
class ScmTransformacaoItem extends BaseScmTransformacaoItem
{
	public function postInsert ($e) {
		$this->ScmMaquina->dt_ultima_transformacao = $this->ScmTransformacaoDoc->dt_transformacao;
		$this->ScmMaquina->id_jogo = $this->id_jogo;
		$this->ScmMaquina->nr_versao_jogo = $this->nr_versao_jogo;
		$this->ScmMaquina->vl_credito = $this->vl_credito;
		$this->ScmMaquina->id_gabinete = $this->id_gabinete;
		$this->ScmMaquina->nr_cont_1 = $this->nr_cont_1;
		$this->ScmMaquina->nr_cont_2 = $this->nr_cont_2;
		$this->ScmMaquina->nr_cont_3 = $this->nr_cont_3;
		$this->ScmMaquina->nr_cont_4 = $this->nr_cont_4;
		$this->ScmMaquina->nr_cont_5 = $this->nr_cont_5;
		$this->ScmMaquina->nr_cont_6 = $this->nr_cont_6;
		$this->ScmMaquina->id_moeda = $this->id_moeda;
		$this->ScmMaquina->save();
	}
}