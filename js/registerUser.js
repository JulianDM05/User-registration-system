// Importación de elementos HTML
const userName = document.querySelector('input.name') // Nombre del usuario
const userLastName = document.querySelector('input.lastname') // Apellido del usuario
const userPhone = document.querySelector('input.phone') // Teléfono del usuario
const userAddress = document.querySelector('input.address') // Dirección del usuario
const userEmail = document.querySelector('input.email') // Correo electrónico del usuario

// Alertas de longitud excedida
const userNameAlert = document.querySelector('.bi.bi-exclamation-triangle.name')
const userLastNameAlert = document.querySelector('.bi.bi-exclamation-triangle.lastname')
const userPhoneAlert = document.querySelector('.bi.bi-exclamation-triangle.phone')
const userAddressAlert = document.querySelector('.bi.bi-exclamation-triangle.address')
const userEmailAlert = document.querySelector('.bi.bi-exclamation-triangle.email')

// Texto usado para indicar errores en el formulario
const errorAlert = document.querySelector('.error-alert')

// Botones del formulario
const cancelButton = document.querySelector('.btn.go-back') // Boton para volver a la página de búsqueda de usuarios
const registerButton = document.querySelector('.btn.open-pop-up') // Boton para abrir popup de confirmación de registro

// Sección de popup para confirmarción de registro de usuario
const warningSection = document.querySelector('.warning-background') // Sección que contiene el popup utilizado para confirmar el registro de usuario
const popUpCancelButton = document.querySelector('.cancel-register') // Boton para cancelar la confirmación de registro

// El usuario presiona una tecla en los inputs correspondientes
userName.addEventListener('keypress', insertFullName)
userLastName.addEventListener('keypress', insertFullName)
userPhone.addEventListener('keypress', insertPhone)
userAddress.addEventListener('keypress', insertAddress)

// El usuario hace click en el boton para volver a la página de búsqueda de usuarios
cancelButton.addEventListener('click', goBack)
registerButton.addEventListener('click', openPopUp)
popUpCancelButton.addEventListener('click', closePopUp)

// Controla que el usuario no ingrese carácteres como números al ingresar sus nombres y apellidos
function insertFullName(event) {
  const charCode = event.which || event.keyCode // Almacena el código de cáracter de la tecla presionada por el usuario
    const isValid =
      (charCode >= 65 && charCode <= 90) || // A-Z
      (charCode >= 97 && charCode <= 122) || // a-z
      (charCode >= 192 && charCode <= 255) || // Acentos
      (charCode === 32) // ' '
        
  if (!isValid) {
    event.preventDefault() // Permite que el usuario ingrese exclusivamente carácteres de texto
  }
}

// Controla que el usuario ingrese unicamente números al momento de ingresar su número telefónico
function insertPhone(event) {
  const charCode = event.which || event.keyCode // Almacena el código de cáracter de la tecla presionada por el usuario
  const isValid = (charCode >= 48 && charCode <= 57) // 0-9

  if (!isValid) {
    event.preventDefault() // Permite que el usuario ingrese exclusivamente carácteres numéricos
  }
}

// Controla que el usuario ingrese carácteres relacionados a una dirección
function insertAddress(event) {
  const symbols = [32, 35, 45, 46, 170, 176] // ' ', #, -, ., °, ª
  const charCode = event.which || event.keyCode
  const isValid =
    (charCode >= 48 && charCode <= 57) || // 0-9
    (charCode >= 65 && charCode <= 90) || // A-Z
    (charCode >= 97 && charCode <= 122) || // a-z
    (charCode >= 192 && charCode <= 255) || // Acentos
    (symbols.includes(charCode)) // Carácteres dentro del array de simbolos 'symbols'
        
  if (!isValid) {
    event.preventDefault() // Permite que el usuario ingrese exclusivamente carácteres relacionados a la dirección
  }
}

// Permite que el usuario pueda volver al panel de búsqueda
function goBack(event) {
  userName.required = false
  userLastName.required = false
  userPhone.required = false
  userAddress.required = false
  userEmail.required = false
}

// Permite activar la visualización del popup para confirmar el registro de usuario
function openPopUp(event) {
  event.preventDefault()

  // Reinicio del texto usado para indicar errores
  errorAlert.textContent = ''
  
  // Visualización de alertas si la longitud fue excedida según corresponda
  userName.value.length > 50 ? userNameAlert.style.display = 'inline' : userNameAlert.style.display = 'none'
  userLastName.value.length > 50 ? userLastNameAlert.style.display = 'inline' : userLastNameAlert.style.display = 'none'
  userPhone.value.length > 15 ? userPhoneAlert.style.display = 'inline' : userPhoneAlert.style.display = 'none'
  userAddress.value.length > 60 ? userAddressAlert.style.display = 'inline' : userAddressAlert.style.display = 'none'
  userEmail.value.length > 50 ? userEmailAlert.style.display = 'inline' : userEmailAlert.style.display = 'none'

  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/ // Expresión regular usada para verificar que el usuario ingresa un email
  const emailTest = emailRegex.test(userEmail.value)
  
  // Los datos fueron ingresados correctamente en todos los inputs
  if ((userName.value.length > 0 && userName.value.length <= 50) &&
      (userLastName.value.length > 0 && userLastName.value.length <= 50) &&
      (userPhone.value.length > 0 && userPhone.value.length <= 15) &&
      (userAddress.value.length > 0 && userAddress.value.length <= 60) &&
      (userEmail.value.length > 0 && userEmail.value.length <= 50) && emailTest) {
        warningSection.style.display = 'flex'
      }

      // Hay uno o más inputs vacíos
      else if ((userName.value.length === 0) ||
        (userLastName.value.length === 0) ||
        (userPhone.value.length === 0) ||
        (userAddress.value.length === 0) ||
        (userEmail.value.length === 0)) {
          errorAlert.textContent = 'Debe ingresar todos los datos en las secciones designadas'
      }

      // El formato de email es incorrecto
      else if (!emailTest) {
        errorAlert.textContent = 'El formato de correo electrónico ingresado es incorrecto'
      }
}

// Permite desactivar la visualización del popup para confirmar el registro de usuario
function closePopUp(event) {
  event.preventDefault()
  warningSection.style.display = 'none'
}