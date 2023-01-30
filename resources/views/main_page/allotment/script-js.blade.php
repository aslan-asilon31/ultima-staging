<script>
    var roomSelected =null;
    function setAllotment(e, id) {
            if (allotmentBefore != "") {
                allotmentBefore.classList.remove('active');
            }

            allotmentBefore = e;

            e.classList.add('active');
            $('#active_allotment').val(id);
            setBackgroundDefault(true);
            setAllotmentRate();

            var setStart = $('#date_start');
            var setEnd = $('#date_end');

            let current_datetime = new Date();
            let formatted_date = months[current_datetime.getMonth()] + ' ' + current_datetime.getDate() + ", " +
                current_datetime.getFullYear() + ' - ' +
                months[current_datetime.getMonth()] + ' ' + current_datetime.getDate() + ", " + current_datetime
                .getFullYear();
            $('#date-show').text(formatted_date);

            var startDate = current_datetime.toISOString().slice(0, 10);
            roomSelected = roomsType.find(room=>room.id==id)
            if(roomSelected){
                const htmlOPts = roomSelected.room_rate_plans.reduce((a,b)=>a+ `<option value="${b.rate_plan.id}">${b.rate_plan.rate_name}</option>`,`<option disabled selected>Select Rate</option>`)
                $("select[name=ratesplan_name]").html(htmlOPts)    
            }

            // console.log(htmlOPts);
            rooms.some(function(data, index) {
                if (data.id == id) {
                    $('#room_id').val(data.id);
                    $('#room_type').val(data.room_name);
                    $('#room_extrabed_rate').val(data.room_extrabed_rate);
                    $('#room_allotment').val(formatRibuan(data.room_allotment));
                    $('#room_allotment_input').val(data.room_allotment);

                    $('#remaining_allotment').val(formatRibuan(data.room_allotment));
                    var day = current_datetime.getDay();
                    if (day == 0 || day > 4) {
                        $('#room_publish_rate').val(formatRibuan(data.room_weekend_rate));
                        $('#room_publish_rate_input').val(data.room_weekend_rate);
                        $('#room_ro_rate').val(formatRibuan(data.room_weekend_ro_rate));
                        $('#room_ro_rate_input').val(data.room_weekend_ro_rate);

                    } else {
                        $('#room_publish_rate').val(formatRibuan(data.room_publish_rate));
                        $('#room_publish_rate_input').val(data.room_publish_rate);
                        $('#room_ro_rate').val(formatRibuan(data.room_ro_rate));
                        $('#room_ro_rate_input').val(data.room_ro_rate);
                    }

                    if (data['allotment'].length > 0) {
                        data['allotment'].some(function(allotment, index) {
                            if (allotment.allotment_date == startDate) {
                                $('#room_extrabed_rate').val(allotment.allotment_extrabed_rate);
                                $('#room_allotment').val(formatRibuan(allotment.allotment_room));
                                $('#room_allotment_input').val(allotment.allotment_room);
                                $('#remaining_allotment').val(formatRibuan(allotment.remaining_allotment));
                                $('#room_publish_rate').val(formatRibuan(allotment.allotment_publish_rate));
                                $('#room_publish_rate_input').val(allotment.allotment_publish_rate);
                                $('#room_ro_rate').val(formatRibuan(allotment.allotment_ro_rate));
                                $('#room_ro_rate_input').val(allotment.allotment_ro_rate);
                                return true;
                            }
                        });
                    }
                    return true;
                }
            });
            setTimeout(function() {
                $('#' + startDate).attr('style', 'background:var(--quaternary-font-color);');
                setStart.val(String(startDate));
                setEnd.val(String(startDate));
            }, 100);
    }

    function myFunction(element) {
        if(!roomSelected) return 

        const optionSelected = element.options[element.selectedIndex];
        var text = element.options[element.selectedIndex].text;
        const article = document.getElementById("ratesplan_id");

        const rrp = roomSelected.room_rate_plans.find(rrp=>rrp.rate_id==optionSelected.value)

        document.getElementById("demo").innerHTML = text;
        document.getElementById("baserate").innerHTML = rrp.rate_plan.base_rate;
        document.getElementById("extrabedrate").innerHTML =rrp.rate_plan.extrabed_rate;
    }



</script>