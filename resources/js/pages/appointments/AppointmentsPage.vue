<template>
    <div class="section-wrapper my-5">
        <div class="container-xxl">
            <h1 class="my-5 d-flex align-items-center">
                <i class="bi bi-calendar-week me-3 fs-1"></i>
                График
            </h1>
            <div style="max-width: 200px;" class="text-black mb-5">
                <FormKit
                    type="date"
                    name="date"
                    :value="today"
                    label="Изберете дата"
                    validation="required"
                    validation-visibility="live"
                    @input="submitFormHandler"
                    style="background-color: white; color: black"
                />
            </div>
            <div class="table-responsive my-5" v-if="appointments">
                <i class="bi bi-arrow-left-right fs-1 d-block d-sm-none text-center"></i>
                <div v-if="isLoading">
                    <h1 class="text-center my-5">Зареждане...</h1>
                </div>
                <div v-else>
                    <strong><small>Час</small></strong>
                    <table class="table table-dark table-striped text-center align-middle">
                        <thead>
                        <tr>
                            <th class="fw-normal position-relative"
                                style="min-width: 125px; height:50px;border-right: 2px solid white;" v-for="i in 8">
                            <span class="position-absolute top-50 start-50 translate-middle"
                                  style="white-space: nowrap">
                                {{
                                    (i + 10) + ':00 - ' + (i + 11) + ':00'
                                }}
                            </span>
                            </th>
                        </tr>
                        </thead>
                        <tbody v-if="appointments.length > 0">
                        <tr>
                            <td v-for="i in 8">
                                <template v-for="item in appointments">
                                    <div class="slot" v-if="item[0].split('.')[0] == i+10"
                                         :data-hours="parseInt(item[1]) - parseInt(item[0])"
                                         :data-minutes="item[0].split('.')[1]"
                                         :data-minutes-end="item[1].split('.')[1]"
                                         :data-full-day="parseInt(item[1]) - parseInt(item[0]) === 9 ? 'true' : 'false'"
                                    >
                                    </div>
                                </template>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="text-center my-5" v-if="appointments.length === 0">
                    Всички часове за тази дата са свободни
                </div>
            </div>
            <div class="actions">
                <a :href="`tel:${$MOBILE_CONST}`" class="d-inline-block btn_tertiary btn-inverse">Запази час по
                    телефона</a>
            </div>
        </div>
    </div>
</template>

<script>
import {computed, onMounted, ref} from "vue";
import axios from "axios";

export default {
    name: "AppointmentsPage",
    setup() {
        const appointments = ref(null);
        const isLoading = ref(false);

        const today = computed(() => {
            const date = new Date();
            const dd = String(date.getDate()).padStart(2, '0');
            const mm = String(date.getMonth() + 1).padStart(2, '0'); //January is 0!
            const yyyy = date.getFullYear();

            return yyyy + '-' + mm + '-' + dd;
        })

        function submitFormHandler(data) {
            isLoading.value = true;
            axios.get('/api/appointments', {params: {date: data}}).then(res => {
                isLoading.value = false;
                if (res.status === 200) {
                    appointments.value = res.data.map(e => {
                        return [e.from_h, e.until_h]
                    });
                }
            }).catch(
                e => {
                    isLoading.value = false;
                    console.log('Could not fetch appointments', e)
                }
            )
        }

        onMounted(() => {
            submitFormHandler(today.value)
        });


        return {
            appointments,
            submitFormHandler,
            today,
            isLoading
        }
    }
}
</script>

<style lang="scss" scoped>
table {
    min-width: 1100px;
    margin: auto;
}

tr {
    border: 0;
}

td {
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
    white-space: nowrap;

    &[data-full-day="true"] {
        background-color: transparent;

        &:after {
            content: 'Няма свободни часове за този ден';
        }
    }

    &:after {
        display: block;
        content: 'Зает';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 100%;
        height: 100%;
        transform: translate(-50%, -50%);
        font-size: 15px;
        line-height: 70px;
        white-space: nowrap;
    }


    &[data-minutes="30"] {
        left: 50%;
    }

    &[data-hours='0'] {
        width: 50%;

        &[data-minutes-end="30"] {
            width: 50%;
            float: left;
        }
    }

    &[data-hours='1'] {
        width: 100%;

        &[data-minutes="30"] {
            width: 50%;
        }

        &[data-minutes-end="30"] {
            width: 150%;
        }

        &[data-minutes-end="30"][data-minutes="30"] {
            width: 100%;
        }
    }

    &[data-hours='2'] {
        width: 200%;

        &[data-minutes="30"] {
            width: 150%;
        }

        &[data-minutes-end="30"] {
            width: 250%;
        }


        &[data-minutes-end="30"][data-minutes="30"] {
            width: 200%;
        }
    }

    &[data-hours='3'] {
        width: 300%;

        &[data-minutes="30"] {
            width: 250%;
        }

        &[data-minutes-end="30"] {
            width: 350%;
        }

        &[data-minutes-end="30"][data-minutes="30"] {
            width: 300%;
        }
    }

    &[data-hours='4'] {
        width: 400%;

        &[data-minutes="30"] {
            width: 350%;
        }

        &[data-minutes-end="30"] {
            width: 450%;
        }

        &[data-minutes-end="30"][data-minutes="30"] {
            width: 400%;
        }
    }

    &[data-hours='5'] {
        width: 500%;

        &[data-minutes="30"] {
            width: 450%;
        }

        &[data-minutes-end="30"] {
            width: 550%;
        }

        &[data-minutes-end="30"][data-minutes="30"] {
            width: 500%;
        }
    }

    &[data-hours='6'] {
        width: 600%;

        &[data-minutes="30"] {
            width: 550%;
        }

        &[data-minutes-end="30"] {
            width: 650%;
        }

        &[data-minutes-end="30"][data-minutes="30"] {
            width: 600%;
        }
    }

    &[data-hours='7'] {
        width: 700%;
    }

    &[data-hours='8'] {
        width: 800%;

        &[data-minutes="30"] {
            width: 750%;
        }

        &[data-minutes-end="30"] {
            width: 850%;
        }

        &[data-minutes-end="30"][data-minutes="30"] {
            width: 800%;
        }
    }

    &[data-hours='9'] {
        width: 900%;

        &[data-minutes="30"] {
            width: 850%;
        }

        &[data-minutes-end="30"] {
            width: 950%;
        }

        &[data-minutes-end="30"][data-minutes="30"] {
            width: 900%;
        }
    }
}

.bi-arrow-left-right {
    animation: moveScroll;
    animation-duration: 4000ms;
    animation-timing-function: ease-out;
    animation-iteration-count: infinite;
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

@keyframes moveScroll {
    0% {
        transform: translateX(0);
    }
    25% {
        transform: translateX(10px);
    }
    50% {
        transform: translateX(0);
    }
    75% {
        transform: translateX(-10px);
    }
    100% {
        transform: translateX(0);
    }
}
</style>
