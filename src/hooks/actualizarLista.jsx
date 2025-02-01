import { useState, useEffect } from 'react';
import useFetchData from '../services/api/mostrarDatos';

const ActualizarLista = () => {
    const { data, loading, error, fetchData } = useFetchData();
    const [lista, setLista] = useState([]);

    const actualizarLista = async () => {
        try {
            const nuevaLista = await fetchData();
            setLista([...nuevaLista]); 
            console.log('Nueva lista obtenida:', nuevaLista);
        } catch (error) {
            console.error('Ha ocurrido un error al actualizar sus datos', error);
        }
    };

    useEffect(() => {
        actualizarLista();
    }, [fetchData]);

    return { lista, loading, error, actualizarLista };
};

export default ActualizarLista;