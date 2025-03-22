let amount = document.getElementById("amount");

document.getElementById("increase").addEventListener("click", () => {
  amount.value = Number(amount.value) + 1;
  amount.disabled = false;
});
document.getElementById("decrease").addEventListener("click", () => {
  if (amount.value !== "1") {
    amount.value = Number(amount.value) - 1;
  }
});

// cart contents are stored in session
// const add_cart_btn = document.querySelector(".add-to-cart");
// const cart_modal_body = document.getElementById("cart-modal-body");

// add_cart_btn.addEventListener("click", () => {
//   const product_info = add_cart_btn.dataset.info;
//   // product_info_array.push(product_info);

//   let product_info_array = product_info.split(",");
//   product_info_array.push(amount.value);

//   product_info_array = {
//     p_id: product_info_array[0],
//     p_name: product_info_array[1],
//     p_price: product_info_array[2],
//     p_amount: product_info_array[3],
//   };

//   // Check if the key exists in localStorage
//   // parse the data from localStorage
//   let items = JSON.parse(localStorage.getItem("cart_information"));
//   if (localStorage.getItem("cart_information")) {
//     // If the key exists, update its value
//     // Add
//     let newItem = product_info_array;
//     items.push(newItem);
//     // Update
//     localStorage.setItem("cart_information", JSON.stringify(items));
//     shopping_list(items);
//   } else {
//     // If the key doesn't exist, create it and set its value
//     localStorage.setItem(
//       "cart_information",
//       JSON.stringify([product_info_array])
//     );
//     shopping_list(items);
//   }
//   // console.log(JSON.parse(localStorage.getItem("cart_information")));
// });

// let items = JSON.parse(localStorage.getItem("cart_information"));
// cart_modal_body.innerHTML = shopping_list(items);

// function shopping_list(list) {
//   let element = ``;
//   if (list) {
//     list.forEach((item) => {
//       element += `
//         <div class="border-bottom border-primary py-3" id="${item.p_id}">
//           <h5 class="mb-0 fs-5">${item.p_name}</h5>
//           <p class="badge ps-0 mb-2 text-secondary">${item.p_price}$</p>

//           <div class="d-flex align-items-end">
//             <div class='input-group align-items-center rounded'>
//               <span class='decrease pointer transition-05' id='decrease'
//                 data-uuid='${item.p_id}'>
//                 <svg xmlns="http://www.w3.org/2000/svg" fill="black" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" width="1em" class="w-6 h-6">
//                   <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15" />
//                 </svg>
//               </span>

//               <input class='col-2 border-0 text-center fs-6' type='number' step="1" value=${item.p_amount} id='amount-${item.p_id}'>
//               <span class='increase pointer transition-05' id='increase' data-uuid='${item.p_id}'>
//                 <svg xmlns="http://www.w3.org/2000/svg" fill="black" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" width="1em" class="w-6 h-6">
//                   <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
//                 </svg>
//               </span>

//             </div>
//             <button class="btn col-1 p-0">
//               <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="dodgerblue" class="w-6 h-6" style="height:1.3em; width:1.3em;">
//                 <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
//               </svg>
//             </button>

//                 <p class=""></p>
//           </div>
//         </div>`;
//     });
//   }

//   return (cart_modal_body.innerHTML = element);
// }

// // document.querySelectorAll(".increase").forEach((element) => {
// //   element.addEventListener("click", () => {
// //   const amount = document.getElementById(`amount-${element.dataset.uuid}`);
// //   amount.value = Number(amount.value) + 1;
// //   // amount.disabled = false;
// //   });
// // });

// // document.querySelectorAll(".decrease").forEach((element) => {
// //   element.addEventListener("click", () => {
// //     const amount = document.getElementById(`amount-${element.dataset.uuid}`);
// //     amount.value = Number(amount.value) - 1;
// //     // amount.disabled = false;
// //   });
// // });

// amounter("increase", 1);
// amounter("decrease", -1);
// let amount_value = 0;

// function amounter(selector, number) {
//   document.querySelectorAll(`.${selector}`).forEach((element) => {
//     element.addEventListener("click", () => {
//       const amount = document.getElementById(`amount-${element.dataset.uuid}`);
//       if (Number(amount.value) > 0) {
//         // amount_value = amount.value;
//         amount.value = Number(amount.value) + number;
//       } else if (amount.value === "" || Number(amount_value) === 0) {
//         amount.value = "1";
//         amount.value = Number(amount.value) + number;
//       }
//     });
//   });
// }
