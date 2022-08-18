const createProductButton = document.querySelector('#createProductButton')

createProductButton.addEventListener("click", async function(e) {
  e.preventDefault()
  e.stopPropagation()
  const form = document.querySelector('#productForm')
  const formData = new FormData(form)
  for (const [key, value] of formData.entries()) {
    console.log({key, value})
  }
  const response = await fetch(`${window.location.origin}/products/store2`, {
    method: "POST",
    headers: {
      'Accept': 'application/json',
    },
    body: formData,
  })
  const data = await response.json()
  console.log({ response, data })
})