// Importación de elementos HTML

// Inputs del formulario
const userPhone = document.querySelector('input.phone') // Teléfono
const userAddress = document.querySelector('input.address') // Dirección
const userEmail = document.querySelector('input.email') // Email

// Sección utilizada para indicar al usuario notaciones de errores en el formulario
const errorNotationSection = document.querySelector('.error-notation.section') // Sección

// Alertas de longitud excedida
const userPhoneAlert = document.querySelector('.bi.bi-exclamation-triangle.phone')
const userAddressAlert = document.querySelector('.bi.bi-exclamation-triangle.address')
const userEmailAlert = document.querySelector('.bi.bi-exclamation-triangle.email')

// Texto usado para indicar errores en el formulario
const errorAlert = document.querySelector('.error-alert')

// Botones del formulario
const updateButton = document.querySelector('.btn.update') // Boton usado para actualizar los datos del usuarioo para abrir un popup de confirmación de acción
const openPopUpButton = document.querySelector('.btn.open-pop-up') // Boton usado para eliminar al usuario
const goBackButton = document.querySelector('.btn.back') // Boton usado para volver a la página de búsqueda de usuarios
const cancelUpdateButton = document.querySelector('.btn.cancel-update') // Boton usado para cancelar la actualización de datos del usuario

// Sección de popup para confirmación de eliminación de usuario
const warningDeleteSection = document.querySelector('.warning-background.delete-user') // Sección que contiene el popup utilizado para confirmar el registro de usuario
const popUpCancelDeleteButton = document.querySelector('.cancel-delete') // Boton para cancelar la confirmación de la acción

// Sección de popup para confirmación de actualización de datos del usuario
const warningUpdateSection = document.querySelector('.warning-background.update-user') // Sección que contiene el popup utilizado para confirmar el registro de usuario
const popUpCancelUpdateButton = document.querySelector('button.cancel-update') // Boton para cancelar la confirmación de la acción

// Almacenamiento de los valores iniciales en cada input del formulario
const userPhoneValue = userPhone.value
const userAddressValue = userAddress.value
const userEmailValue = userEmail.value

// El usuario presiona el boton para abrir el popup de confirmación de eliminación de usuario
openPopUpButton.addEventListener('click', (event) => {
  event.preventDefault()
  warningDeleteSection.style.display = 'flex'
})

popUpCancelDeleteButton.addEventListener('click', (event) => {
  event.preventDefault()
  warningDeleteSection.style.display = 'none'
})

// El usuario presiona el boton para actualizar datos del usuario
updateButton.addEventListener('click', (event) => {
  event.preventDefault()

  // Se va a confirmar la actualización de datos del usuario
  if (updateButton.name === 'confirm') {
    // Reinicio del texto usado para indicar errores
    errorAlert.textContent = ''
    
    // Visualización de alertas si la longitud fue excedida según corresponda
    userPhone.value.length > 15 ? userPhoneAlert.style.display = 'inline' : userPhoneAlert.style.display = 'none'
    userAddress.value.length > 60 ? userAddressAlert.style.display = 'inline' : userAddressAlert.style.display = 'none'
    userEmail.value.length > 50 ? userEmailAlert.style.display = 'inline' : userEmailAlert.style.display = 'none'

    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/ // Expresión regular usada para verificar que el usuario ingresa un email
    const emailTest = emailRegex.test(userEmail.value)
    
    // Los datos fueron ingresados correctamente en todos los inputs
    if ((userPhone.value.length > 0 && userPhone.value.length <= 15) &&
        (userAddress.value.length > 0 && userAddress.value.length <= 60) &&
        (userEmail.value.length > 0 && userEmail.value.length <= 50) && emailTest) {
          warningUpdateSection.style.display = 'flex'
        }

        // Hay uno o más inputs vacíos
        else if ((userPhone.value.length === 0) ||
          (userAddress.value.length === 0) ||
          (userEmail.value.length === 0)) {
            errorAlert.textContent = 'Debe ingresar todos los datos en las secciones designadas'
        }

        // El formato de email es incorrecto
        else if (!emailTest) {
          errorAlert.textContent = 'El formato de correo electrónico ingresado es incorrecto'
        }
  }

  // Se va a realizar la actualización de datos del usuario
  else if (updateButton.name === 'update') {
    // Se habilita el ingreso de texto en los inputs
    userPhone.disabled = false
    userAddress.disabled = false
    userEmail.disabled = false

    // Se habilita la visualización de la sección de notación de errores para el ingreso de datos en el formulario
    errorNotationSection.style.display = 'flex'

    // Actualización de los botones del formulario
    updateButton.value = 'Confirmar'
    updateButton.name = 'confirm'
    openPopUpButton.style.display = 'none'
    goBackButton.style.display = 'none'
    cancelUpdateButton.style.display = 'block'
  }
})

popUpCancelUpdateButton.addEventListener('click', (event) => {
  event.preventDefault()

  // Se desactiva la visualización del popup para confirmar la actualización de datos
  warningUpdateSection.style.display = 'none'
})

// El usuario presiona el boton para cancelar la actualización de datos del usuario
cancelUpdateButton.addEventListener('click', (event) => {
  event.preventDefault()

  // Se deshabilita el ingreso de texto en los inputs
  userPhone.disabled = true
  userAddress.disabled = true
  userEmail.disabled = true

  // Actualización de los botones del formulario
  updateButton.value = 'Actualizar'
  updateButton.name = 'update'
  openPopUpButton.style.display = 'block'
  goBackButton.style.display = 'block'
  cancelUpdateButton.style.display = 'none'

  // Reinicio del valor de cada input del formulario
  userPhone.value = userPhoneValue
  userAddress.value = userAddressValue
  userEmail.value = userEmailValue

  // Desactivación de la visualización de la notación de errores
  errorNotationSection.style.display = 'none'
})