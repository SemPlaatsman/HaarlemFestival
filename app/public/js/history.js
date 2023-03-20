let tourschedule = document.getElementById('tourschedule');

 Gettourschedule(0);
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
    for (let i = 0; i < schedule.length; i++) {

        const date = new Date(schedule[i].date.date);
        const month = date.toLocaleString('default', { month: 'short' });
        const monthday = date.toLocaleString('default', { day: '2-digit' });
        let hours = [];

        for (let j = 0; j < schedule.length; j++) {

            const date2 =  new Date(schedule[j].date.date);
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
    let html = '';
    for (let i = 0; i < tabledata.length; i++) {
        html += '<tr>';
        const date = new Date(tabledata[i][0]);
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
    tourschedule.innerHTML = html;

}
