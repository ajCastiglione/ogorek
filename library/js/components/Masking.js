export default function inputMask($) {
  let options = $("#wpforms-5022-field_16");
  options.on("click", (e) => {
    let choice = $(e.target).val();
    if (choice.includes("Less than")) {
      let num = $("#wpforms-5022-field_42");
      num.val("$");
      num.on("change", (e) => {
        let formatted = numberWithCommas(num.val());
        num.val(`${formatted}`);
      });
    }
  });
}

function numberWithCommas(x) {
  return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}
