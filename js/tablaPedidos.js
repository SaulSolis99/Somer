/*
tablaAlumnos.js
Pinta la tabla de Alumnos con la opción de crear nuevos
*/
Ext.require([
    'Ext.plugin.Viewport'
]);
var nLinActual = -1;
Ext.onReady(function(){
	//Define "clase" Alumno
    Ext.define('Materia', {
		extend: 'Ext.data.Model',
		fields: ['clave', 'nombre', 'creditos']
	});
	
	//Define almacenamiento de Alumno proveniente de PHP y usado en la tabla (grid)
	Ext.create('Ext.data.Store', {
		extend: 'Ext.data.Store',
		storeId: 'Materias',
		model: 'Materia',
		autoLoad: true, //se carga al definirse
		
		proxy: {
			type: 'ajax',
			actionMethods: {
				read: 'GET'
			},
			batchActions: false,
			api: {
				read: 'buscaTodasMaterias.php',
			},
			reader: {
				type: 'json',
				rootProperty: 'arrMateria'
			},
			writer: {
				type: 'json'
			},
			listeners: {
				exception: function(proxy, response, operation, eOpts) {
					Ext.Msg.alert(
						'Aviso',
						'Error al llamar al servidor'
					);
				}
			}
		}
	});
	
	//Define tabla que usa almacenamiento proveniente de PHP
	Ext.create('Ext.grid.Panel', {
		renderTo: Ext.get("espacio1"),
		store: Ext.data.StoreManager.lookup('Materias'),
		width: "90%",
		height: "31em",
		title: 'Materias',
		selType: 'rowmodel',
		id: "tblMat",
		plugins: {
			ptype: 'rowediting',
			clicksToEdit: 2,
			listeners: {
				edit: function(editor, e, eOpts) {
					 alert("Información enviada");
				}
			}
		},
		columns: [
			{
				text: 'Clave',
				width: '10%',
				dataIndex: 'clave'
			},
			{
				text: 'Materia',
				width: '50%',
				dataIndex: 'nombre',
				editor: {
					xtype: 'textfield',
					allowBlank: false
				}
			},
			{
				text: 'Creditos',
				width: '20%',
				dataIndex: 'creditos',
				editor: {
					xtype: 'textfield',
					allowBlank: false
				}
			}
		],
		listeners: {
			select: function(selModel, record, index, options){
				nLinActual = index;
			}
		},
	});
});