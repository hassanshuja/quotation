<template>
  <div>
    <form @submit.prevent="onSubmit">
      <b-row>
        <b-col xl="8">
          <b-card>
            <h3 class="card-title" slot="header">{{ isNew ? $t('labels.backend.settings.titles.create') : $t('labels.backend.settings.titles.edit') }}</h3>
            <b-form-group
              :label="$t('validation.settings.company_name')"
              label-for="company_name"
              horizontal
              :label-cols="2"
              :feedback="feedback('company_name')"
            >
              <b-form-input
                id="company_name"
                name="company_name"
                :placeholder="$t('validation.settings.company_name')"
                v-model="model.company_name"
                :state="state('company_name')"
              ></b-form-input>
            </b-form-group>

            <b-form-group
              :label="$t('validation.settings.company_address')"
              label-for="company_address"
              horizontal
              :label-cols="2"
              :feedback="feedback('company_address')"
            >
              <b-form-textarea
                id="company_address"
                name="company_address"
                :placeholder="$t('validation.settings.company_address')"
                rows="5"
                v-model="model.company_address"
                :state="state('company_address')"
              ></b-form-textarea>
            </b-form-group>

            <b-form-group
              :label="$t('validation.settings.bank_account')"
              label-for="bank_account"
              horizontal
              :label-cols="2"
              :feedback="feedback('bank_account')"
            >
              <b-form-input
                id="bank_account"
                name="bank_account"
                :placeholder="$t('validation.settings.bank_account')"
                v-model="model.bank_account"
                :state="state('bank_account')"
              ></b-form-input>
            </b-form-group>

            <b-form-group
              :label="$t('validation.settings.quote_ref_alphabet')"
              label-for="quote_ref_alphabet"
              horizontal
              :label-cols="2"
              :feedback="feedback('quote_ref_alphabet')"
            >
              <b-form-input
                id="quote_ref_alphabet"
                name="quote_ref_alphabet"
                :placeholder="$t('validation.settings.quote_ref_alphabet')"
                v-model="model.quote_ref_alphabet"
                :state="state('quote_ref_alphabet')"
              ></b-form-input>
            </b-form-group>

            <b-form-group
              :label="$t('validation.settings.invoice_ref_alphabet')"
              label-for="invoice_ref_alphabet"
              horizontal
              :label-cols="2"
              :feedback="feedback('invoice_ref_alphabet')"
            >
              <b-form-input
                id="invoice_ref_alphabet"
                name="invoice_ref_alphabet"
                :placeholder="$t('validation.settings.invoice_ref_alphabet')"
                v-model="model.invoice_ref_alphabet"
                :state="state('invoice_ref_alphabet')"
              ></b-form-input>
            </b-form-group>

            <b-form-group
              :label="$t('validation.settings.quote_ref_start')"
              label-for="quote_ref_start"
              horizontal
              :label-cols="2"
              :feedback="feedback('quote_ref_start')"
            >
              <b-form-input
                id="quote_ref_start"
                name="quote_ref_start"
                :placeholder="$t('validation.settings.quote_ref_start')"
                v-model="model.quote_ref_start"
                :state="state('quote_ref_start')"
              ></b-form-input>
            </b-form-group>

            <b-form-group
              :label="$t('validation.settings.invoice_ref_start')"
              label-for="invoice_ref_start"
              horizontal
              :label-cols="2"
              :feedback="feedback('invoice_ref_start')"
            >
              <b-form-input
                id="invoice_ref_start"
                name="invoice_ref_start"
                :placeholder="$t('validation.settings.invoice_ref_start')"
                v-model="model.invoice_ref_start"
                :state="state('invoice_ref_start')"
              ></b-form-input>
            </b-form-group>

            <b-form-group
              :label="$t('validation.settings.quote_vat')"
              label-for="quote_vat"
              horizontal
              :label-cols="2"
              :feedback="feedback('quote_vat')"
            >
              <v-select
                id="quote_vat"
                name="quote_vat"
                placeholder="Please Select Vat Rates"
                v-model="model.quote_vat"
                :state="state('quote_vat')"
                :options="vat_rates"
              ></v-select>
            </b-form-group>

            <b-form-group
              :label="$t('validation.settings.company_logo')"
              label-for="company_logo"
              horizontal
              :label-cols="2"
              :feedback="feedback('company_logo')"
            >
              <template v-if="model.company_logo">
                <b-form-file v-if="model.company_logo" placeholder="Change Logo..." @change="onFileSelected"></b-form-file>
                <div class="company-logo">
                  <img :src="'/uploads/'+ model.company_logo">
                </div>
              </template>
              <template v-if="!model.company_logo">
                <b-form-file v-if="!model.company_logo" placeholder="Select Logo..." @change="onFileSelected"></b-form-file>
              </template>
            </b-form-group>
            <b-form-group
              :label="$t('validation.attributes.roles')"
              label-for="roles"
              horizontal
              :label-cols="3"
            >
              <!-- <b-form-checkbox-group stacked v-model="model.district" name="roles[]">
                <b-form-checkbox
                v-b-tooltip.left
                :title="role.description"
                :value="role.id"
                >
                  Enable District
                </b-form-checkbox>
              </b-form-checkbox-group> -->
            </b-form-group>

            <b-row slot="footer">
              <b-col md>
                <b-button to="/settings" exact variant="danger" size="md">
                  {{ $t('buttons.back') }}
                </b-button>
              </b-col>
              <b-col md>
                <b-dropdown right split :text="$t('buttons.settings.save_and_publish')" class="float-right"
                            variant="success" size="sm" @click="onSubmit()"
                            :disabled="pending"
                            v-if="isNew || this.$app.user.can('edit settings') || this.$app.user.can('edit own settings')"
                >
                </b-dropdown>
              </b-col>
            </b-row>
          </b-card>
        </b-col>
      </b-row>
    </form>
  </div>
</template>

<script>
import axios from 'axios'
import settingsform from '../../mixins/settingsform'

export default {
  name: 'SettingsForm',
  mixins: [settingsform],
  data () {
    return {
      config: {
        wrap: true,
        time_24hr: true,
        enableTime: true
      },
      modelName: 'setting',
      resourceRoute: 'settings',
      listPath: '/settings/create',
      jobcards: [],
      selectedLogo: {},
      vat_rates: [],
      edit_id: 'null',
      model: {
        company_name: null,
        company_address: null,
        new_company_logo: null,
        company_logo: null,
        bank_account: null,
        quote_ref_start: null,
        quote_ref_alphabet: null,
        invoice_ref_alphabet: null,
        quote_vat: null,
        invoice_ref_start: null,
        district: 0
      }
      // role:{
      //   description:""
      // }
    }
  },
  watch: {
    'edit_id': function (val) {
      if (val !== 'null') {
        this.$router.push('/settings/' + this.edit_id + '/edit')
      }
    }
  },
  created () {
    this.getVats()
    this.getSettings()
  },
  methods: {
    async getSettings () {
      let { data } = await axios.get(this.$app.route('admin.settings.getdata'))
      if (data) {
        this.edit_id = data.id
      }
    },
    onFileSelected: function (event) {
      this.selectedLogo = event.target.files[0]
      this.model.new_company_logo = event.target.files[0].name
    },
    async getVats () {
      let { data } = await axios.get(this.$app.route('admin.vats.getids'), {})

      this.vat_rates = data.ids
    }
  }
}
</script>
