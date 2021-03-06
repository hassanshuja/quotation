<template>
  <div>
    <b-card>
      <template slot="header">
        <h3 class="card-title">{{ $t('labels.backend.invoices.titles.index') }}</h3>
        <div class="card-options" v-if="this.$app.user.can('create invoices')">
          <b-button to="/invoices/create" variant="success" size="sm">
            <i class="fe fe-plus-circle"></i> {{ $t('buttons.invoices.create') }}
          </b-button>
        </div>
      </template>
      <b-datatable ref="datasource"
                   @context-changed="onContextChanged"
                   search-route="admin.invoices.search"
                   delete-route="admin.invoices.destroy"
                   action-route="admin.invoices.batch_action" :actions="actions"
                   :selected.sync="selected"
      >
        <b-table class="my-table" ref="datatable"
                 striped
                 bordered
                 show-empty
                 stacked="md"
                 no-local-sorting
                 :empty-text="$t('labels.datatables.no_results')"
                 :empty-filtered-text="$t('labels.datatables.no_matched_results')"
                 :fields="fields"
                 :items="dataLoadProvider"
                 sort-by="invoices.created_at"
                 :sort-desc="false"
        >
          <template v-slot:head(checkbox)="row"></template>
          <template v-slot:cell(checkbox)="row">
            <b-form-checkbox :value="row.item.id" v-model="selected"></b-form-checkbox>
          </template>
          <template v-slot:cell(invoice_name)="row">
            <span v-text="row.item.invoice_name"></span>
          </template>
          <template v-slot:cell(invoice_reference)="row">
            <span v-text="row.item.invoice_digit"></span>-
            <span v-text="row.item.invoice_number"></span>
          </template>
          <template v-slot:cell(net_amount)="row">
            <span>{{ parseFloat(row.item.net_amount).toFixed(2) }}</span>
          </template>
          <template v-slot:cell(vat_amount)="row">
            <span>{{ parseFloat(row.item.vat_amount).toFixed(2) }}</span>
          </template>
          <template v-slot:cell(total_amount)="row">
            <span>{{ parseFloat(row.item.total_amount).toFixed(2) }}</span>
          </template>
          <template v-slot:cell(invoice_status)="row">
            <span style="text-transform: capitalize;" v-text="row.item.invoice_status"></span>
          </template>
          <template v-slot:cell(invoices.created_at)="row">
            {{ row.item.created_at }}
          </template>
          <template v-slot:cell(invoices.updated_at)="row">
            {{ row.item.updated_at }}
          </template>
          <template v-slot:cell(actions)="row">
            <b-button size="sm" variant="success" :to="`/invoices/${row.item.id}/view`" v-b-tooltip.hover :title="$t('buttons.preview')" class="mr-1">
              <i class="fe fe-eye"></i>
            </b-button>
            <b-button v-if="row.item.id" size="sm" variant="primary" :to="`/invoices/${row.item.id}/edit`" v-b-tooltip.hover :title="$t('buttons.edit')" class="mr-1">
              <i class="fe fe-edit"></i>
            </b-button>
            <b-button v-if="row.item.id" size="sm" variant="danger" v-b-tooltip.hover :title="$t('buttons.delete')" @click.stop="onDelete(row.item.id)">
              <i class="fe fe-trash"></i>
            </b-button>
          </template>
        </b-table>
      </b-datatable>
    </b-card>
  </div>
</template>

<script>

export default {
  name: 'InvoicesList',
  data () {
    return {
      selected: [],
      fields: [
        { key: 'checkbox' },
        { key: 'invoice_reference', label: this.$t('validation.invoices.invoice_reference'), sortable: false },
        { key: 'invoice_name', label: this.$t('validation.invoices.invoice_name'), sortable: true },
        { key: 'client_email', label: this.$t('validation.invoices.client_email'), sortable: true },
        { key: 'net_amount', label: this.$t('validation.invoices.net_amount'), sortable: true },
        { key: 'vat_amount', label: this.$t('validation.invoices.vat_amount'), sortable: true },
        { key: 'total_amount', label: this.$t('validation.invoices.total_amount'), sortable: true },
        { key: 'invoice_status', label: this.$t('validation.invoices.invoice_status') },
        { key: 'invoices.created_at', label: this.$t('labels.created_at'), 'class': 'text-center', sortable: true },
        { key: 'invoices.updated_at', label: this.$t('labels.updated_at'), 'class': 'text-center', sortable: true },
        { key: 'actions', label: this.$t('labels.actions'), 'class': 'nowrap' }
      ],
      actions: {
        destroy: this.$t('labels.backend.invoices.actions.destroy')
      }
    }
  },
  methods: {
    dataLoadProvider (ctx) {
      return this.$refs.datasource.loadData(ctx.sortBy, ctx.sortDesc)
    },
    onContextChanged () {
      return this.$refs.datatable.refresh()
    },
    onDelete (id) {
      this.$refs.datasource.deleteRow({ invoice: id })
    }
  }
}
</script>
