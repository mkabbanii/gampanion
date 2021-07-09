<template>
    <div>
        <GooglePayButton
            v-if="this.$route.query.amount && this.$route.query.customer_id"
            :form="form"
            v-on:paymentSuccess="handlePaymentSuccess()"
        />
    </div>
</template>

<script>
import GooglePayButton from "../Components/GooglePayButton.vue";

export default {
    components: {
        GooglePayButton
    },
    data() {
        return {
            form: {
                amount: "0.00",
                customer_id: 0
            }
        };
    },
    methods: {
        setLinkQueries() {
            this.form.amount = this.$route.query.amount;
            this.form.customer_id = this.$route.query.customer_id;
        },
        handlePaymentSuccess(value) {
            console.log(value.transactionState);
        }
    },
    created() {
        this.setLinkQueries();
    }
};
</script>

<style></style>
