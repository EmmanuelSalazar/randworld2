import React from 'react';
import { Form, Input, Button } from 'antd';
import AlmacenarDatos from '../services/api/almacenarDatos';
import { ListaContext } from '../contexts/ListaContexto';

const Formulario = () => {
  const { actualizarLista } = React.useContext(ListaContext);

  const onFinish = async (values) => {
    try {
      await AlmacenarDatos(values);
      await actualizarLista();
    } catch (error) {
      console.log('Ha ocurrido un error', error);
    }
  };

  return (
    <Form
      name="formulario"
      labelCol={{ span: 8 }}
      wrapperCol={{ span: 16 }}
      style={{ maxWidth: 600 }}
      autoComplete="on"
      onFinish={onFinish}
    >
      <Form.Item
        label="Nombre"
        name="nombre"
        rules={[{ required: true, message: 'Por favor ingrese su nombre' }]}
      >
        <Input name="nombre" />
      </Form.Item>
      <Form.Item
        label="Precio"
        name="precio"
        rules={[{ required: true, message: 'Por favor ingrese el precio' }]}
      >
        <Input type="number" />
      </Form.Item>
      <Form.Item
        label="Cantidad"
        name="cantidad"
        rules={[{ required: true, message: 'Por favor ingrese la cantidad' }]}
      >
        <Input type="number" />
      </Form.Item>
      <Form.Item
        label="Monto recibido"
        name="montoRecibido"
        rules={[{ required: true, message: 'Por favor ingrese el monto recibido' }]}
      >
        <Input type="number" />
      </Form.Item>
      <Form.Item label={null}>
        <Button type="primary" htmlType="submit">
          Enviar
        </Button>
      </Form.Item>
    </Form>
  );
};

export default Formulario;