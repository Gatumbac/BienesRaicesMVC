document.addEventListener('DOMContentLoaded', () => {
    eventListeners()
    darkMode()
})


function eventListeners() {
    const mobileMenu = document.querySelector('.mobile-menu')

    mobileMenu.addEventListener('click', navegacionResponsive)

    //Muestra campos condicionales
    const metodoContacto = document.querySelectorAll('input[name="contacto"]')
    console.log(metodoContacto);
    metodoContacto.forEach(input => input.addEventListener('click', mostrarMetodosContacto))
}

function navegacionResponsive() {
    const navegacion = document.querySelector('.navegacion') 
    /*
    if (navegacion.classList.contains('mostrar')) {
        navegacion.classList.remove('mostrar')
    } else {
        navegacion.classList.add('mostrar')
    }
    */
   // Una forma más sencilla -> toggle
   navegacion.classList.toggle('mostrar')
}

function darkMode() {
    const prefiereDarkMode = window.matchMedia('(prefers-color-scheme: dark)')

    const configurar = () => {
        if(prefiereDarkMode.matches) {
            document.body.classList.add('dark-mode')
        } else {
            document.body.classList.remove('dark-mode')
        }
    }

    configurar()

    prefiereDarkMode.addEventListener('change', configurar)

    const botonDark = document.querySelector('.icon-dark-mode')
    botonDark.addEventListener('click', function() {
        document.body.classList.toggle('dark-mode')
    })
}

function mostrarMetodosContacto(e) {
    const contactoDiv = document.querySelector('#contacto');

    if (e.target.value === 'telefono') {
        contactoDiv.innerHTML = `
            <label for="telefono">Número de teléfono</label>
            <input id="telefono" name="telefono" type="tel" placeholder="Tu teléfono">

            <p>Elija la fecha y la hora para ser contactado</p>

            <label for="fecha">Fecha</label>
            <input id="fecha" name="fecha" type="date">

            <label for="hora">Hora</label>
            <input id="hora" name="hora" type="time" min="08:00" max="17:00">
        `
    } else {
        contactoDiv.innerHTML = `
            <label for="email">Correo Electrónico</label>
            <input id="email" name="email" type="email" placeholder="Tu email" required>
        `
    }
}