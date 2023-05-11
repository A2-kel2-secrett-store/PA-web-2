$('#image').on('change', (e) => {
  const file = document.querySelector('#image').files[0];
  const reader = new FileReader();

  reader.addEventListener('load', (e) => {
    $('#profile-img').attr('src', e.target.result);
  })
  reader.readAsDataURL(file)
})