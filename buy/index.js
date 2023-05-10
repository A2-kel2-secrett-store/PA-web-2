// Get Users Data
const users = JSON.parse(localStorage.getItem('users') ?? '[]');

// Get id / index
const idx = users.findIndex((user) => user.email === email ?? '');

export function currency(duit) {
  return Intl.NumberFormat("id-ID", {
    style: "currency",
    currency: "IDR",
  }).format(parseFloat(duit));
}

function usdToIdr(dollar) {
  const rupiah = 14779.724;
  return rupiah * parseFloat(dollar)
}

function hitungTotal(idItem) {

  const amount = $(`#amount-${idItem}`).val();
  const price = $(`#price-${idItem}`).val() * amount;
  const disc = $(`#disc-${idItem}`).val() ?? 0;

  if (disc == 0 && !$(`#harga-${idItem}`).hasClass('hidden')) {
    $(`.hargadisc-${idItem}`).html(currency(price))
    $(`.harga-${idItem}`).addClass('hidden');
  }
  const discPrice = price * (parseInt(disc, 10) / 100)
  const total = price - discPrice;

  if (disc > 0) {
    $(`.hargadisc-${idItem}`).html(currency(total))
    $(`.harga-${idItem}`).html(currency(price)).removeClass('hidden');
  }

  return {
    amount,
    total,
    disc,
    price,
  }

}

async function getData() {
  const res = await fetch('http://makeup-api.herokuapp.com/api/v1/products.json?brand=maybelline', { method: 'GET' });

  const datas = await res.json()

  const elements = datas.map((data) => `
        <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
          <a class="flex items-center justify-center w-full" href="#">
            <img id="img-${data.id}" class="rounded-t-lg" src="${data.image_link}" alt="${data.name}" />
          </a>
          <div class="p-5 h-max">
            <a href="#">
              <h5 class="mb-1 name-${data.id} text-2xl font-bold tracking-tight text-gray-900 dark:text-white">${data.name}</h5>
            </a>
            <div class="flex items-center ">
              <div class="hargadisc-${data.id} mr-2 font-bold mb-2 text-gr text-xl line-through">${currency(usdToIdr(data.price))}</div>
              <div class="harga-${data.id} font-bold mb-2 text-pink-400 text-xl hidden line-through">${currency(usdToIdr(data.price))}</div>
            </div>
            
            <div class="flex flex-col justify-between h-full">
              <p class="mb-3 line-clamp-4 font-normal text-gray-700 dark:text-gray-400">${data.description}</p>
            </div>
            <div class="flex items-center justify-between mb-3">
              <div class="flex flex-col">
                <label for="amount">Jumlah</label>
                <input data-id="${data.id}" id="amount-${data.id}" value="1" min="1" max="99" class="amount w-16 rounded-lg shadow-sm" type="number">
              </div>
              ${data.vip ? `<div class="flex flex-col">
                <label class="font-bold text-gr" for="disc">Diskon VIP!</label>
                <select data-id="${data.id}" id="disc-${data.id}" class="disc-select block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-pink-300 focus:ring focus:ring-pink-200 focus:ring-opacity-50">
                  <option value="0" selected>-- Pilih Diskon ---</option>
                  <option value="10">Diskon 10%</option>
                  <option value="15">Diskon 15%</option>
                  <option value="20">Diskon 20%</option>
                  <option value="25">Diskon 25%</option>
                </select>
              </div>` : ''}
              
            </div>
            <input id="price-${data.id}" hidden value="${usdToIdr(data.price)}" />
            <button data-id="${data.id}" class="btn-beli rounded-lg bg-pink-600 text-white px-3 py-1 w-full font-bold text-lg">Beli Sekarang</button>
          </div>
        </div>
  `);

  $('#items').html(elements.join(''))
}

getData()

$(document).on('click', '.btn-beli', function () {
  const idItem = $(this).data('id');

  const res = hitungTotal(idItem);

  const { amount, disc, price, total } = res

  const namaItem = $(`.name-${idItem}`).html();

  const text = [
    `Anda Yakin Ingin ingin membeli\n`,
    `Nama: ${namaItem}\n`,
    `Harga: ${currency(total)}\n`,
    `Jumlah: ${amount}\n`
  ];

  const purchase = {
    id_user: idx,
    id_item: idItem,
    name_item: namaItem,
    price,
    amount,
    total,
    email,
    img: $(`#img-${idItem}`).prop('src'),
  }

  if (disc > 0) {
    text.push(`Dengan potongan ${disc}%`);
    purchase['disc'] = disc;
  }

  const conf = confirm(text.join(''));

  if (!conf) {
    return;
  }

  const purchases = JSON.parse(localStorage.getItem('purchases') ?? '[]');

  purchases.push(purchase);

  localStorage.setItem('purchases', JSON.stringify(purchases));

  alert("Berhasil Beli 😆");

});

$(document).on('change', '.disc-select', function () {
  const idItem = $(this).data('id');

  hitungTotal(idItem);
});

$(document).on('change', '.amount', function () {
  const idItem = $(this).data('id');

  hitungTotal(idItem);
});
