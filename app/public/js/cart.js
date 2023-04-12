function copyCartLink(cartLink) {
    console.log(cartLink);
    navigator.clipboard.writeText(cartLink);

    var copyCartBtn = document.getElementById("copyCartBtn");
    copyCartBtn.classList.remove('btn-tetiare-a');
    copyCartBtn.classList.add('btn-success');
    copyCartBtn.innerText = 'SUCCESSFULLY COPIED TO CLIPBOARD!'
  }