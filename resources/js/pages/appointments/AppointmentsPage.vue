<template>
    <div class="section-wrapper my-5 min-vh-100">
        <div class="container-xxl">
            <h1 class="my-5 d-flex align-items-center">
                <i class="bi bi-calendar-week me-3 fs-1"></i>
                График
            </h1>
            <div style="max-width: 200px;" class="text-black mb-5">
                <FormKit
                    type="date"
                    name="date"
                    :value="toslot"
                    label="Изберете дата"
                    validation="required"
                    validation-visibility="live"
                    @input="submitFormHandler"
                    style="background-color: white; color: black"
                />
            </div>
            <div class="table-responsive my-5" v-if="appointments">
                <table v-if="appointments.length > 0" class="table table-dark table-striped text-center align-middle">
                    <thead>
                    <tr>
                        <th class="fw-normal" style="border-right: 2px solid white;" v-for="i in 10">{{
                                i + 9
                            }}:00ч.
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td v-for="i in 10">
                            <template v-for="item in appointments">
                                <div class="slot" v-if="item[0].split(':')[0] == i+9"
                                     :data-hours="parseInt(item[1]) - parseInt(item[0])"
                                     :data-minutes="item[1].split(':')[1]"
                                >
                                </div>
                            </template>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div class="min-vh-100" v-else>
                    <h1 class="text-center my-5">Няма данни за тези дати...</h1>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {onMounted, ref, computed} from "vue";
import axios from "axios";

export default {
    name: "AppointmentsPage",
    setup() {
        const appointments = ref(null);

        const toslot = computed(() => {
            const date = new Date();
            const dd = String(date.getDate()).padStart(2, '0');
            const mm = String(date.getMonth() + 1).padStart(2, '0'); //January is 0!
            const yyyy = date.getFullYear();

            return yyyy + '-' + mm + '-' + dd;
        })

        function submitFormHandler(data) {
            axios.get('/api/appointments', {params: {date: data}}).then(res => {
                if (res.status === 200) {
                    appointments.value = res.data.map(e => {
                        return [e.from_h, e.until_h]
                    });

                }
            }).catch(
                e => console.log('Could not fetch appointments', e)
            )
        }

        onMounted(() => {
            submitFormHandler(toslot.value)
        });


        return {
            appointments,
            submitFormHandler,
            toslot
        }
    }
}
</script>

<style lang="scss" scoped>
table {
    min-width: 750px;
    margin: auto;
}

tr {
    border: 0;
}

th {
    background-color: #659498;
    padding: 10px 0;
    border-bottom: 0;
}

td, th {
    padding-left: 0 !important;
    padding-right: 0 !important;
}

.slot {
    position: relative;
    background-color: #659498;
    width: 100%;
    height: 70px;
    border-left: 2px solid #2c3034;
    border-right: 2px solid #2c3034;

    &:after {
        display: block;
        content: 'Зает слот';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 100%;
        height: 100%;
        transform: translate(-50%, -50%);
        font-size: 15px;
        line-height: 70px;
    }

    &[data-minutes="30"] {
        left: 50% !important;
    }

    &[data-hours='0'] {
        width: 100%;

        &[data-minutes="30"] {
            width: 50%;
        }
    }

    &[data-hours='1'] {
        width: 100%;
    }

    &[data-hours='2'] {
        width: 200%;
    }

    &[data-hours='3'] {
        width: 300%;
    }

    &[data-hours='4'] {
        width: 400%;
    }

    &[data-hours='5'] {
        width: 500%;
    }

    &[data-hours='6'] {
        width: 600%;
    }

    &[data-hours='7'] {
        width: 700%;
    }

    &[data-hours='8'] {
        width: 800%;
    }

    &[data-hours='9'] {
        width: 900%;
    }

    &[data-hours='10'] {
        width: 1000%;
    }


}

.slot.active {
    background-color: red;
    color: black;
}

.slot.half {
    background-color: red;
    color: black;
    width: 150%;
}
</style>
