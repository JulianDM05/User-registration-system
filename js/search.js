// Importación de elementos HTML
const numOfDocument = document.querySelector('.numofdoc') // Input usado para ingresar el número de documento
const errorAlert = document.querySelector('.error-alert') // Párrafo utilizado para indicar al usuario que presionó una tecla no permitida
const goBackButton = document.querySelector('.go-back') // Botón utilizado para volver a la página anterior
const typeOfDocument = document.querySelector('.typeofdoc') // Lista desplegable usadas para seleccionar el tipo de documento

// Se registran el código de las teclas que el usuario no podrá ingresar en un input de tipo 'number'
const bannedKeyCodes = [69, 187, 189, 190]

let currentInputValue = '' // Se almacenará el valor del input cuando el usuario presione una tecla

// El administrador presiona una tecla sobre el input de ingreso de número de documento
numOfDocument.addEventListener('keyup', (e) => {
  if (bannedKeyCodes.includes(e.keyCode)) { // Se verifica si el administrador presionó una tecla que no es válida
    numOfDocument.value = String(currentInputValue)
    numOfDocument.blur()
    errorAlert.textContent = 'Debe ingresar únicamente números enteros'
  } else {
    currentInputValue = numOfDocument.value
    errorAlert.textContent = ''
  }
})

// El usuario hace click en el botón para regresar a la página anterior
goBackButton.addEventListener('click', (e) => {
  // Se establece la propiedad 'required' en false para poder volver a la página anterior
  numOfDocument.required= false;
  typeOfDocument.required = false;
})