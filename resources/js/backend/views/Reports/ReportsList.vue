<template>
  <div>
    <b-card>
      <template slot="header">
        <h3 class="card-title">{{ $t('labels.backend.reports.titles.index') }}</h3>
      </template>
      <template class="pull-right">
        <div id="hideprint" class="pull-right">
          <b-btn class="btn-show pull-right" id="download" variant="secondary" @click="printFacture()">Download Pdf<i class="fe fe-file fe-lg"></i></b-btn>
        </div>
      </template>

      <b-datatable
        ref="datasource"
        @context-changed="onContextChanged"
        search-route="admin.jobcard.jobcardreports"
        delete-route="admin.reports.destroy"
        action-route="admin.reports.batch_action"
        :actions="actions"
        :selected.sync="selected"
      >
        <b-table
          ref="datatable"
          striped
          bordered
          show-empty
          stacked="md"
          no-local-sorting
          :empty-text="$t('labels.datatables.no_results')"
          :empty-filtered-text="$t('labels.datatables.no_matched_results')"
          :fields="fields"
          :items="dataLoadProvider"
          sort-by="reports.created_at"
          :sort-desc="true"
          id="expenses-report"
          v-model="model.rows"
        >
          <template v-slot:cell(created_at)="row">
            <span>{{ row.item.created_at }}</span>
          </template>
          <template v-slot:cell(expenses)="row">
            <span>ZAR {{ parseFloat(row.item.expenses).toFixed(2) }}</span>
          </template>
          <template v-slot:cell(quote_amount)="row">
            <span>ZAR {{ parseFloat(row.item.quote_amount).toFixed(2) }}</span>
          </template>
          <template v-slot:cell(profit)="row">
            <span>ZAR {{ (parseFloat(row.item.quote_amount) - parseFloat(row.item.expenses)).toFixed(2) }}</span>
          </template>
          <template v-slot:cell(status)="row">
            <span v-if="row.item.status === 'Received'">Received</span>
            <span v-if="row.item.status === 'Assigned'">Assigned</span>
            <span v-if="row.item.status === 'On Hold'">On Hold</span>
            <span v-if="row.item.status === 'Completed'">Completed</span>
            <span v-if="row.item.status === 'Submitted for vetting'">Submitted for Vetting</span>
            <span v-if="row.item.status === 'Quoted'">Quoted</span>
            <span v-if="row.item.status === 'Invoiced'">Invoiced</span>
            <span v-if="row.item.status === 'Paid'">Paid</span>
            <span v-if="row.item.status === 'Cancelled'">Cancelled</span>
          </template>
          <template slot="bottom-row" slot-scope="row">
            <td>Total</td>
            <td></td>
            <td>ZAR {{ parseFloat(totalExpense).toFixed(2) }}</td>
            <td>ZAR {{ parseFloat(amountQuoted).toFixed(2) }}</td>
            <td>ZAR {{ parseFloat(profit).toFixed(2) }}</td>
            <td></td>
          </template>
        </b-table>
      </b-datatable>
    </b-card>
  </div>
</template>
<script>
import html2pdf from 'html2pdf.js'
import { setTimeout } from 'timers'

export default {
  name: 'ReportsList',
  data () {
    return {
      model: {
        expenses: [],
        services: [],
        rows: []
      },
      selected: [],
      totalexp: 0,
      quotedAmount: [],
      fields: [
        { key: 'created_at', label: 'Date' },
        { key: 'jobcard_num', label: 'Jobcard #' },
        { key: 'expenses', label: 'Expenses' },
        { key: 'quote_amount', label: 'Quoted Amount' },
        { key: 'profit', label: 'Profit' },
        { key: 'status', label: 'Status' }
      ],
      actions: {
        destroy: this.$t('labels.backend.reports.actions.destroy')
      }
    }
  },
  computed: {
    totalExpense: function () {
      console.log(this.model.rows)
      return this.model.rows.reduce((accum, item) => {
      // Assuming expenses is the field you want to total up
        return accum + parseFloat(item.expenses)
      }, 0.00)
      // return this.$store.state.totals.expense
    },
    amountQuoted: function () {
      // console.log(this.model.rows)
      return this.model.rows.reduce((accum, item) => {
      // Assuming expenses is the field you want to total up
        return accum + parseFloat(item.quote_amount)
      }, 0.00)
      // return this.$store.state.totals.expense
    },
    profit: function () {
      // console.log(this.model.rows)
      return this.model.rows.reduce((accum, item) => {
      // Assuming expenses is the field you want to total up
        let netAmount = parseFloat(item.quote_amount) - parseFloat(item.expenses)
        return accum + parseFloat(netAmount)
      }, 0.00)
      // return this.$store.state.totals.expense
    }

  },
  methods: {
    async dataLoadProvider (ctx) {
      await this.$refs.datasource.loadData(ctx.sortBy, ctx.sortDesc)
        .then((res) => { this.model.rows = res })
      // console.log(this.model.rows)
      return this.model.rows
    },
    onContextChanged () {
      return this.$refs.datatable.refresh()
    },
    onDelete (id) {
      this.$refs.datasource.deleteRow({ report: id })
    },
    // searchByDate(ctx) {
    //   this.$refs.datasource.loadData(this.date).then(res => this.$refs.datatable.refresh())
    // },
    printFacture: function () {
      this.HideButtons()
      var elementor = document.getElementById('expenses-report')
      html2pdf(elementor, {
        margin: 1.5,
        filename: 'expensesReport.pdf',
        // image: { type: 'png' },
        html2canvas: { dpi: 900, letterRendering: false },
        jsPDF: { unit: 'cm', format: 'a3', orientation: 'l' }
      })
      setTimeout(() => {
        $('.card-body .row').show()
        $('#download').show()
      }, 2000)
    },
    HideButtons: function () {
      $('.card-body .row').hide()
      $('#download').hide()
    }
  }
}
</script>
