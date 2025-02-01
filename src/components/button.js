import React, {use, useEffect, useState} from 'react';
import { Button, Col } from 'antd';
import ActualizarLista from '../hooks/actualizarLista';

const MyButton = () => {
    const {lista, loading, error, updateFunction} = ActualizarLista();
    console.log(lista);
    return (
        <Col>
         <Button color="purple" variant='dashed' onClick={updateFunction}>Primary Button</Button>
        </Col>
    );
}
export default MyButton;
