import { ListaProvider } from './contexts/ListaContexto.jsx';
import Formulario from './components/form';
import  ListaVentas  from './components/listaVentas';
import { Container, Row, Col } from 'react-bootstrap';

function App() {
  
 return (
  <Container style={{padding: '48px 48px'}}>
    <Row style={{justifyContent: 'space-around'}}>
    <ListaProvider>
      <Col xs={12} sm={6} md={4} style={{display: 'flex', alignItems: 'center', flexDirection: 'column'}}>
      <h3>Insertar Venta</h3>
        <Formulario />
      </Col>
      <Col xs={12} sm={6} md={4}>
        <ListaVentas />
      </Col>
      </ListaProvider>
    </Row>
</Container>
  );
}
export default App;