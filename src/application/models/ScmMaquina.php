<?php

/**
 * ScmMaquina
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 6401 2009-09-24 16:12:04Z guilhermeblanco $
 */
class ScmMaquina extends BaseScmMaquina
{
	public function preInsert ($event) {
		$this->dt_sistema = DMG_Date::now();
		$this->id_status = 1;
	}
	public function postInsert ($e) {
		$mvDoc = new ScmMovimentacaoDoc();
		$mvDoc->id_origem = 1;
		$mvDoc->dt_movimentacao = $this->dt_cadastro;
		$mvDoc->id_filial = $this->id_filial;
		$mvDoc->tp_movimento = 'E';
		$mvDoc->id_local = $this->id_local;
		$mvDoc->id_usuario = $this->id_usuario;
		$mvDoc->dt_sistema = DMG_Date::now();
		$mvDoc->save();
		$mvItem = new ScmMovimentacaoItem();
		$mvItem->id_movimentacao_doc = $mvDoc->id;
		$mvItem->id_maquina = $this->id;
		$mvItem->nr_cont_1 = $this->nr_cont_1;
		$mvItem->nr_cont_2 = $this->nr_cont_2;
		$mvItem->nr_cont_3 = $this->nr_cont_3;
		$mvItem->nr_cont_4 = $this->nr_cont_4;
		$mvItem->nr_cont_5 = $this->nr_cont_5;
		$mvItem->nr_cont_6 = $this->nr_cont_6;
		$mvItem->percent_local = $this->percent_local;
		$mvItem->save();
		$trDoc = new ScmTransformacaoDoc();
		$trDoc->id_origem = 1;
		$trDoc->dt_transformacao = $this->dt_cadastro;
		$trDoc->id_filial = $this->id_filial;
		$trDoc->id_local = $this->id_local;
		$trDoc->id_usuario = $this->id_usuario;
		$trDoc->dt_sistema = DMG_Date::now();
		$trDoc->save();
		$trItem = new ScmTransformacaoItem();
		$trItem->id_transformacao_doc = $trDoc->id;
		$trItem->id_maquina = $this->id;
		$trItem->nr_cont_1 = $this->nr_cont_1;
		$trItem->nr_cont_2 = $this->nr_cont_2;
		$trItem->nr_cont_3 = $this->nr_cont_3;
		$trItem->nr_cont_4 = $this->nr_cont_4;
		$trItem->nr_cont_5 = $this->nr_cont_5;
		$trItem->nr_cont_6 = $this->nr_cont_6;
		$trItem->id_jogo = $this->id_jogo;
		$trItem->nr_versao_jogo = $this->nr_versao_jogo;
		$trItem->vl_credito = $this->vl_credito;
		$trItem->id_gabinete = $this->id_gabinete;
		$trItem->id_moeda = $this->id_moeda;
		$trItem->save();
		$hsStatus = new ScmHistoricoStatus();
		$hsStatus->id_status = $this->id_status;
		$hsStatus->dt_status = $this->dt_cadastro;
		$hsStatus->id_maquina = $this->id;
		$hsStatus->id_filial = $this->id_filial;
		$hsStatus->id_local = $this->id_local;
		$hsStatus->id_parceiro = $this->id_parceiro;
		$hsStatus->id_usuario = $this->id_usuario;
		$hsStatus->dt_sistema = DMG_Date::now();
		$hsStatus->save();
	}
}