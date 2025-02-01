import React, { useContext, useEffect } from 'react';
import { Table } from 'antd';
import { ListaContext } from '../contexts/ListaContexto';

const ListaVentas = () => {
  const { lista, loading, error, actualizarLista } = useContext(ListaContext);

  useEffect(() => {
    console.log('Lista actualizada en el componente:', lista);
  }, [lista]);

  const columns = [
    { title: 'Nombre', dataIndex: 'nombre', key: 'nombre' },
    { title: 'Precio', dataIndex: 'precio', key: 'precio' },
    { title: 'Cantidad', dataIndex: 'cantidad', key: 'cantidad' },
    { title: 'Monto recibido', dataIndex: 'montoRecibido', key: 'montoRecibido' },
  ];

  if (loading) return <div>Cargando...</div>;
  if (error) return <div>Error: {error.message}</div>;

  return <Table dataSource={lista} columns={columns} rowKey="ID" />;
};

export default ListaVentas;
