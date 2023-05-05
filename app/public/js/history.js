window.addEventListener('load', function() {
    var tourSelect = document.getElementById('tour_select');

    tourSelect.addEventListener('change', function() {
        var selectedTour = tourSelect.options[tourSelect.selectedIndex];

        var singleTicketSpan = document.getElementById('historyFormSingleTicket');
        var price = selectedTour.dataset.price;
        singleTicketSpan.innerHTML = price;

        var familyTicketSpan = document.getElementById('historyFormFamilyTicket');
        var familyPrice = selectedTour.dataset.familyPrice;
        familyTicketSpan.innerHTML = familyPrice;
    });

    tourSelect.dispatchEvent(new Event('change'));
});

let tourschedule = document.getElementById('tourschedule');
let ukButton = document.getElementById('ukflag');
let nlButton = document.getElementById('dutchflag');
let enButton = document.getElementById('chineseflag');
let languageSelect = document.getElementById('language');
Gettourschedule(0);
fetchData(0);

ukButton.addEventListener('click', function() {
    console.log("test");
    Gettourschedule(0);
});
nlButton.addEventListener('click', function() {
    Gettourschedule(1);
});
enButton.addEventListener('click', function() {
    Gettourschedule(2);
});
languageSelect.addEventListener('change', () => {
    let selectedLanguage = languageSelect.value;
    fetchData(selectedLanguage);
  });

async function Gettourschedule(taal) {

    let language = taal;
    let dates = [];
    const formData = new FormData();
    formData.append('language', language);
    const response = await fetch("/history/schedule",{
        method: 'post',
        body: formData

    }).then(response => response.json()).then(data =>{
        const schedule=data;
        console.log(schedule);
    for (let i = 0; i < schedule.length; i++) {

        const date = new Date(schedule[i].datetime.date);
        const month = date.toLocaleString('default', { month: 'short' });
        const monthday = date.toLocaleString('default', { day: '2-digit' });
        let hours = [];

        for (let j = 0; j < schedule.length; j++) {

            const date2 =  new Date(schedule[j].datetime.date);
            const month2 = date.toLocaleString('default', { month: 'short' });
            const monthday2 = date2.toLocaleString('default', { day: '2-digit' });
            if (month == month2 && monthday == monthday2) {
                hours.push(date2);
            }
        }
        dates.push(hours);

        printSchedule(dates);

    }
});

}

function printSchedule(tabledata){
    tourschedule.innerHTML = '';
    let html = '';
    let lastDate = new Date();
    for (let i = 0; i < tabledata.length; i++) {
        if(tabledata[i][0].getDate() != lastDate.getDate()){
        html += '<tr>';
        const date = new Date(tabledata[i][0]);
        lastDate = date;
        const weekDay = date.toLocaleString('default', { weekday: 'long' });
        const month = date.toLocaleString('default', { month: 'short' });
        const day = date.toLocaleString('default', { day: '2-digit' });
        html += "<td class='border-0 rounded-pill bg-transparent'>" + weekDay + " " + day + " " + month + "</td>";

        for (let j = 0; j < tabledata[i].length; j++) {
            const date = new Date(tabledata[i][j]);

            const hour = date.toLocaleString('default', { hour: '2-digit' });
            const minutes = date.toLocaleString('default', { minute: '2-digit' });
            html += "<td class='border-0 rounded-pill bg-primary-a text-center'>" + hour + " " + minutes + "</td>";
        }
        html += "</tr>";
        }

    }
    tourschedule.innerHTML = html;


}

