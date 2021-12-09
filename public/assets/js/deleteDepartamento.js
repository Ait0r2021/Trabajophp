console.log("abc");
$('#modalDelete').on('shown.bs.modal', function (event) {
    let eliminarDepartamento = document.getElementById('eliminarDepartamento');
    let element = event.relatedTarget;
    let action = element.getAttribute('data-url');
    let name = element.dataset.name;
    eliminarDepartamento.innerHTML = name;
    let form = document.getElementById('modalDeleteResourceForm');
    form.action = action;
    
})