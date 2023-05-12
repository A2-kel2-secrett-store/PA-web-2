const users = JSON.parse(localStorage.getItem('users') ?? '[]');
$('#users').html(users.length);

const vip = users.filter((user) => user.vip);
$('#vip').html(vip.length);

const purchases = JSON.parse(localStorage.getItem('purchases') ?? '[]');
$('#purchases').html(`${purchases.length} Pesanan`);