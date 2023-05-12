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


function discount(idItem) {
  const amount = $(`#amount-${idItem}`).val();
  const price = $(`#price-${idItem}`).val() * amount;
  const discPrice = price * (10 / 100)
  const total = price - discPrice;

  $(`.hargadisc-${idItem}`).html(currency(total))
  $(`.harga-${idItem}`).html(currency(price)).removeClass('hidden');
}

function total(idItem){
  const amount = $(`#amount-${idItem}`).val();
  const price = $(`#price-${idItem}`).val() * amount;
  $(`.hargadisc-${idItem}`).html(currency(price))
}

async function getData() {
  const res = await fetch('http://makeup-api.herokuapp.com/api/v1/products.json?brand=maybelline', { method: 'GET' });
  const datas = await res.json()

  let elements = datas.map((data) => `
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
              <div class="belanja harga-${data.id} font-bold mb-2 text-pink-400 text-xl hidden line-through">${currency(usdToIdr(data.price))}</div>
            </div>
            
            <div class="flex flex-col justify-between h-full">
              <p class="mb-3 line-clamp-4 font-normal text-gray-700 dark:text-gray-400">${data.description}</p>
            </div>
            <form action="/database/pembelian.php" method="post">
            <div class="flex items-center justify-between mb-3">
                <div class="flex flex-col">
                  <label for="amount">Jumlah</label>
                  <input data-id="${data.id}" name="total" id="amount-${data.id}" value="1" min="1" max="99" class="amount w-16 rounded-lg shadow-sm" type="number">
                </div>
                <input id="name-${data.id}" hidden name="nama" value="${data.name}" />
                <input id="gambar-${data.id}" hidden name="gambar" value="${data.image_link}" />
                <input id="price-${data.id}" hidden name="harga" value="${usdToIdr(data.price)}" />
                <button data-id="${data.id}" name="submit" class="btn-beli rounded-lg bg-pink-600 mt-5 ml-3 mb-0 text-white px-3 py-1 w-full font-bold text-lg">Beli Sekarang</button>
                </div>
                </form>
          </div>
        </div>`);
  if (role == 'VIP') {
    elements = datas.map((data) => `
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
              <div class="belanja harga-${data.id} font-bold mb-2 text-pink-400 text-xl line-through">${currency(usdToIdr(data.price))}</div>
            </div>
            
            <div class="flex flex-col justify-between h-full">
              <p class="mb-3 line-clamp-4 font-normal text-gray-700 dark:text-gray-400">${data.description}</p>
            </div>
            <form action="/database/pembelian.php" method="post">
            <div class="flex items-center justify-between mb-3">
                <div class="flex flex-col">
                  <label for="amount">Jumlah</label>
                  <input data-id="${data.id}" name="total" id="amount-${data.id}" value="1" min="1" max="99" class="amount w-16 rounded-lg shadow-sm" type="number">
                </div>
                <input id="name-${data.id}" hidden name="nama" value="${data.name}" />
                <input id="gambar-${data.id}" hidden name="gambar" value="${data.image_link}" />
                <input id="price-${data.id}" hidden name="harga" value="${usdToIdr(data.price)}" />
                <button data-id="${data.id}" name="submit" class="btn-beli rounded-lg bg-pink-600 mt-5 ml-3 mb-0 text-white px-3 py-1 w-full font-bold text-lg">Beli Sekarang</button>
                </div>
                </form>
          </div>
        </div>`);
  }
  $('#items').html(elements.join(''))
}

getData()

$(document).on('change', '.amount', function () {
  const idItem = $(this).data('id');
  if(role == "VIP"){
    discount(idItem);
  } else {
    total(idItem)
  }
});