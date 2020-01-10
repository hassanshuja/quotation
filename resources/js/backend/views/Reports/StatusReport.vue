<template>
  <div class="status-report">
    <b-card>
      <template slot="header">
        <h3 class="card-title">Status Reports</h3>
      </template>
      <template class="pull-right">
        <div id="hideprint" class="pull-right">
          <b-btn class="btn-show pull-right" id="download" variant="secondary" @click="printFacture()">Download Pdf<i class="fe fe-file fe-lg"></i></b-btn>
        </div>
      </template>
      <b-datatable
        ref="datasource"
        @context-changed="onContextChanged"
        search-route="admin.jobcard.statusreport"
        delete-route="admin.jobcard.destroy"
        action-route="admin.jobcard.batch_action"
        :selected.sync="selected"
        :export-data="true"
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
          sort-by="jobcard.created_at"
          :sort-desc="true"
          id="status-report"
        >
          <template v-slot:cell(created_at)="row">
            <span>{{ row.item.created_at }}</span>
          </template>
          <template v-slot:cell(facility_name)="row">
            <span>{{ row.item.facility_name }}</span>
          </template>
          <template v-slot:cell(project_manager)="row">
            <span v-if="row.item.get_project_manager">{{ row.item.get_project_manager.name }}</span>
          </template>
          <template v-slot:cell(invoice_number)="row">
            <span v-if="row.item.invoice_number">{{ row.item.invoice_number }}</span>
          </template>
          <template v-slot:cell(assigned_user)="row">
            <span v-if="row.item.get_assigned_user">{{ row.item.get_assigned_user.name }}</span>
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
        </b-table>
      </b-datatable>
    </b-card>
  </div>
</template>

<script>
import html2pdf from 'html2pdf.js'
import { setTimeout } from 'timers'

export default {
  name: 'StatusReport',
  data () {
    return {
      selected: [],
      fields: [
        { key: 'created_at', label: 'Date' },
        { key: 'jobcard_num', label: 'Jobcard #' },
        { key: 'facility_name', label: 'Facility Name' },
        { key: 'description', label: 'Description' },
        { key: 'project_manager', label: 'Project Manager' },
        { key: 'assigned_user', label: 'Assigned Technician' },
        { key: 'invoice_number', label: 'Invoice #' },

        { key: 'status', label: 'Status' }
      ],
      actions: {
        destroy: this.$t('labels.backend.jobcard.actions.destroy')
      }
    }
  },
  created () {},
  methods: {
    dataLoadProvider (ctx) {
      return this.$refs.datasource.loadData(ctx.sortBy, ctx.sortDesc)
    },
    onContextChanged () {
      return this.$refs.datatable.refresh()
    },
    onDelete (id) {
      this.$refs.datasource.deleteRow({ report: id })
    },
    printFacture: function () {
      this.HideButtons()
      var elementor = document.getElementById('status-report')
      html2pdf(elementor, {
        margin: 1.5,
        filename: 'ageingReport.pdf',
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
