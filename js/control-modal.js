const contra = document.querySelector('#contra');
const registro = document.querySelector('#Registro');
const cerrar_contraseña = document.querySelector('#cerrar-contraseña');
const cerrar_registro = document.querySelector('#cerrar-registro');
const modal = document.querySelector('.modal-contraseña');
const modal_registro = document.querySelector('.modal-Registro');

contra.addEventListener('click', () => {

    modal.style.display = 'block';
});

cerrar_contraseña.addEventListener('click', () => {

    modal.style.display = 'none';
});

registro.addEventListener('click', () => {

    modal_registro.style.display = 'block';
});

cerrar_registro.addEventListener('click', () => {

    modal_registro.style.display = 'none';
});


