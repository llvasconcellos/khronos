var sm = new Ext.grid.CheckboxSelectionModel();
var ParqueJogoWindowFilter = new Ext.ux.grid.GridFilters({
	local: false,
	menuFilterText: '<?php echo DMG_Translate::_('grid.filter.label'); ?>',
	filters: [{
		type: 'string',
		dataIndex: 'name',
		phpMode: true
	}]
});
var ParqueJogoWindow = Ext.extend(Ext.grid.GridPanel, {
	border: false,
	stripeRows: true,
	loadMask: true,
	sm: sm,
	columnLines: true,
	plugins: [ParqueJogoWindowFilter],
	initComponent: function () {
		this.store = new Ext.data.JsonStore({
			url: '<?php echo $this->url(array('controller' => 'jogo', 'action' => 'list'), null, true); ?>',
			root: 'data',
			idProperty: 'id',
			totalProperty: 'total',
			autoLoad: true,
			autoDestroy: true,
			remoteSort: true,
			sortInfo: {
				field: 'id',
				direction: 'ASC'
			},
			baseParams: {
				limit: 30
			},
			fields: [
				{name: 'id', type: 'int'},
				{name: 'nm_jogo', type: 'string'}
			]
		});
		var paginator = new Ext.PagingToolbar({
			store: this.store,
			pageSize: 30,
			plugins: [ParqueJogoWindowFilter]
		});
		paginator.addSeparator();
		var button = new Ext.Toolbar.Button();
		button.text = '<?php echo DMG_Translate::_('grid.bbar.clearfilter'); ?>';
		button.addListener('click', function(a, b) {
			ParqueJogoWindowFilter.clearFilters();
		});
		paginator.addButton(button);
		Ext.apply(this, {
			viewConfig: {
				emptyText: '<?php echo DMG_Translate::_('grid.empty'); ?>',
				deferEmptyText: false
			},
			bbar: paginator,
			<?php if (DMG_Acl::canAccess(15) || DMG_Acl::canAccess(16)): ?>
			tbar: ['->',
			<?php if (DMG_Acl::canAccess(15)): ?>
			{
				text: '<?php echo DMG_Translate::_('grid.form.add'); ?>',
				iconCls: 'silk-add',
				scope: this,
				handler: this._onBtnNovoUsuarioClick
			},
			<?php endif; ?>
			<?php if (DMG_Acl::canAccess(16)): ?>
			{
				text: '<?php echo DMG_Translate::_('grid.form.delete'); ?>',
				iconCls: 'silk-delete',
				scope: this,
				handler: this._onBtnExcluirSelecionadosClick
			},
			<?php endif; ?>
			],
			<?php endif; ?>
			columns: [sm, {
				dataIndex: 'id',
				header: '<?php echo DMG_Translate::_('parque.jogo.form.id.text'); ?>',
				width: 40,
				sortable: true
			}, {
				dataIndex: 'nm_jogo',
				header: '<?php echo DMG_Translate::_('parque.jogo.form.nm_jogo.text'); ?>',
				sortable: true
			}]
		});
		ParqueJogoWindow.superclass.initComponent.call(this);
	},
	initEvents: function () {
		ParqueJogoWindow.superclass.initEvents.call(this);
		this.on({
			scope: this,
			<?php if (DMG_Acl::canAccess(14)): ?>
			rowdblclick: this._onGridRowDblClick
			<?php endif; ?>
		});
	},
	onDestroy: function () {
		ParqueJogoWindow.superclass.onDestroy.apply(this, arguments);
		Ext.destroy(this.window);
		this.window = null;
	},
	<?php if (DMG_Acl::canAccess(15)): ?>
	_onBtnNovoUsuarioClick: function () {
		this._newForm();
		this.window.setjogo(0);
		this.window.show();
	},
	<?php endif; ?>
	<?php if (DMG_Acl::canAccess(16)): ?>
	_onBtnExcluirSelecionadosClick: function () {
		var arrSelecionados = this.getSelectionModel().getSelections();
		if (arrSelecionados.length === 0) {
			//Ext.Msg.alert('<?php echo DMG_Translate::_('grid.form.alert.title'); ?>', '<?php echo DMG_Translate::_('grid.form.alert.select'); ?>');
			uiHelper.showMessageBox({title: '<?php echo DMG_Translate::_('grid.form.alert.title'); ?>', msg: '<?php echo DMG_Translate::_('grid.form.alert.select'); ?>'});
			return false;
		}
		uiHelper.confirm('<?php echo DMG_Translate::_('grid.form.confirm.title'); ?>', '<?php echo DMG_Translate::_('grid.form.confirm.delete'); ?>', function (opt) {
			if (opt === 'no') {
				return;
			}
			var id = [];
			for (var i = 0; i < arrSelecionados.length; i++) {
				id.push(arrSelecionados[i].get('id'));
			}
			this.el.mask('<?php echo DMG_Translate::_('grid.form.deleting'); ?>');
			Ext.Ajax.request({
				url: '<?php echo $this->url(array('controller' => 'jogo', 'action' => 'delete'), null, true); ?>',
				params: {
					'id[]': id
				},
				scope: this,
				success: function () {
					this.el.unmask();
					this.store.reload();
				}
			});
		},
		this);
	},
	<?php endif; ?>
	<?php if (DMG_Acl::canAccess(14) || DMG_Acl::canAccess(15) || DMG_Acl::canAccess(16)): ?>
	_onCadastroUsuarioSalvarExcluir: function () {
		this.store.reload();
	},
	<?php endif; ?>
	<?php if (DMG_Acl::canAccess(14)): ?>
	_onGridRowDblClick: function (grid, rowIndex, e) {
		var record = grid.getStore().getAt(rowIndex);
		var id = record.get('id');
		this._newForm();
		this.window.setjogo(id);
		this.window.show();
	},
	<?php endif; ?>
	<?php if (DMG_Acl::canAccess(14) || DMG_Acl::canAccess(15)): ?>
	_newForm: function () {
		if (!this.window) {
			this.window = new ParqueJogoForm({
				renderTo: this.body,
				listeners: {
					scope: this,
					salvar: this._onCadastroUsuarioSalvarExcluir,
					<?php if (DMG_Acl::canAccess(16)): ?>
					excluir: this._onCadastroUsuarioSalvarExcluir
					<?php endif; ?>
				}
			});
		}
		return this.window;
	}
	<?php endif; ?>
});
Ext.reg('parque-jogo', ParqueJogoWindow);