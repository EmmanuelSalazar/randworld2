import axios from "axios"

const AlmacenarDatos = async (values) => {
  try {
    const response = await axios.post("https://compra-seguro.store/api/almacenarDatos.php", values)
    if (!response.data.ok) {
      throw new Error("Ha ocurrido un error al almacenar la venta, si el error persiste, contacta al administrador")
    }
    console.log("Datos almacenados correctamente:", response.data)
    return response.data
  } catch (error) {
    console.error("Error al enviar los datos", error)
    throw error
  }
}

export default AlmacenarDatos
