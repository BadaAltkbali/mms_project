
//***** Custom Print 
// function printDiv() {
//     var printContents = document.getElementById('print').innerHTML;
//     var originalContents = document.body.innerHTML;

//     document.body.innerHTML = printContents;
//     var PrintBtn = document.getElementById('PrintBtn');
//     PrintBtn.style.display = "none"
//     window.print();

//     document.body.innerHTML = originalContents;
// }

// function printDiv() {
//     var PrintBtn = document.getElementById('PrintBtn');
//     PrintBtn.style.display = "none"
//     window.print();
// }


const btn = document.getElementById('PrintBtn')
const sectionToPrint = document.getElementById('print')

btn.addEventListener('click', () => {
    // Create a new window with only the section to print
    var printWindow = window.open('', 'Print Window')

    printWindow.document.write('<html><head><title>Print Section</title>')

    // Link to the CSS stylesheet
    printWindow.document.write('<link rel="stylesheet" href="assets/js/print.css" type="text/css" />')

    printWindow.document.write('</head><body>')

    // Add the section you want to print
    printWindow.document.write(sectionToPrint.innerHTML)

    // Add a button to the new window and listen for the click event
    printWindow.document.write('<button id="print-btn">Print this section</button>')

    const printBtn = printWindow.document.getElementById('print-btn')

    printBtn.addEventListener('click', function () {
        // Remove the print button
        printBtn.remove()

        // Print the new window
        printWindow.print()

        printWindow.close()
    })

    printWindow.document.write('</body></html>')
})
