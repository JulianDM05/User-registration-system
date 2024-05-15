// Importación de elementos HTML
const termsSection = document.querySelector(".terms-and-conditions") // Sección de términos y condiciones
const termsSectionAccept = document.querySelector(".terms-and-conditions.accept") // Sección para la aceptación de términos y condiciones
const checkboxes = document.querySelectorAll(".checkbox") // Elementos checkbox usados para aceptar los términos y condiciones
const registerUser = document.querySelector(".btn.register") // Botón utilizado para proceder con el registro de usuario
const goBackButton = document.querySelector('.btn.go-back') // Botón utilizado para volver a la página de búsqueda de usuarios

// Se desactiva el boton de registro y la selección de los checkbox inicialmente 
checkboxes.forEach(checkbox => checkbox.disabled = true)
registerUser.disabled = true;

// Se añade la clase 'disabled' para modificar el estilo del texto que acompaña los elementos checkbox
termsSectionAccept.classList.add("disabled")

// El usuario hace scroll sobre la sección de términos y condiciones
termsSection.addEventListener("scroll", () => {
  const isScrolledToBottom = termsSection.scrollHeight - termsSection.scrollTop - termsSection.clientHeight <= 1;

  // Se activa el boton de registro y la selección de los checkbox cuando el usuario lea los términos y condiciones
  if (isScrolledToBottom) {
    checkboxes.forEach(checkbox => checkbox.disabled = false)
    registerUser.disabled = false
    termsSectionAccept.classList.remove("disabled") // Se elimina la clase 'disabled' para modificar el estilo del texto nuevamente
  }
})

// El usuario hace click en el botón para regresar a la página anterior
goBackButton.addEventListener('click', (e) => {
  // Se establece la propiedad 'required' en false para poder volver a la página anterior
  checkboxes.forEach(checkbox => checkbox.required = false)
})