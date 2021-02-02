<?php

use app\assets\DynamicAsset;
use app\models\Parameter;
use app\models\ParameterTipe;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Json;

/** @var yii\web\View  $this */
/** @var app\models\Parameter $model */
/** @var yii\widgets\ActiveForm $form  */

$induk = $model->induk ?: Parameter::findOne(['id' => Yii::$app->request->get('id_induk')]);
$all_tipe_model = ParameterTipe::find()->indexBy('id')->all();
$all_tipe = ArrayHelper::map($all_tipe_model, 'id', 'tipe');

DynamicAsset::register($this, 'Flatpickr', '@npm/flatpickr/dist', 'flatpickr.min.js', 'flatpickr.min.css');
$this->registerJsFile('@web/vendor/slimselect/slimselect.js');
$this->registerCssFile('@web/vendor/slimselect/slimselect.min.css');
$this->registerCssFile('@web/vendor/slimselect/custom.css');
?>

<?php $form = ActiveForm::begin([
    'id' => 'param-form',
    'layout' => 'horizontal',
    'enableAjaxValidation' => false,
    'enableClientValidation' => false,
    'fieldConfig' => [
        'horizontalCssClasses' => [
            'label' => 'col-sm-2',
            'wrapper' => 'col-sm-6',
            'error' => '',
            'hint' => '',
        ],
    ]
]); ?>

<div class="pemeriksaan-rincian-form box box-primary">

    <div class="box-header">
        <h3 class="box-title">Form Parameter</h3>
    </div>
    <div class="box-body">
        <?= $form->field($model, 'id_induk')->dropDownList($induk ? [$induk->id => $induk->nama] : [0 => '< ROOT >'], ['readonly' => 1]) ?>
        <?= $form->field($model, 'nama')->label('Parameter') ?>
        <?= $form->field($model, 'id_tipe')->dropDownList($all_tipe)->label('Tipe') ?>

        <div class="field-default">
            <?= $form->field($model, 'default') ?>
            <div class="form-group">
                <label class="control-label col-sm-2" for="param-opts">Options</label>
                <div class="col-sm-6">
                    <div class="input-group">
                        <select id="param-opts" class="form-control slimselect"></select>
                        <a class="input-group-addon" title="toggle" data-toggle><i class="glyphicon glyphicon-plus"></i></a>
                        <p class="help-block help-block-error "></p>
                    </div>
                </div>
            </div>
            <div class="form-group flatpickr">
                <label class="control-label col-sm-2" for="parameter-datetime">Default</label>
                <div class="col-sm-6">
                    <div class="input-group">
                        <input id="parameter-datetime" class="form-control" name="Parameter[datetime]" data-input>
                        <a class="input-group-addon" title="toggle" data-toggle><i class="toggle glyphicon glyphicon-calendar"></i></a>
                        <a class="input-group-addon" title="clear" data-clear><i class="glyphicon glyphicon-remove"></i></a>
                        <p class="help-block help-block-error "></p>
                    </div>
                </div>
            </div>
        </div>

        <?= Html::activeHiddenInput($model, 'id_form', ['value' => $id_form = Yii::$app->request->get('id_form')]) ?>
    </div>

    <div class="box-footer">
        <div class="row">
            <div class="col-sm-offset-2 col-sm-3">
                <?= Html::submitButton('<i class="fa fa-check"></i> Simpan', ['class' => 'btn btn-success btn-flat']) ?>
                <?= Html::a('<i class="fa fa-times"></i> Batal', ['templet-form/view', 'id' => $model->id_form], ['class' => 'btn btn-default btn-flat']) ?>
            </div>
        </div>
    </div>

</div>

<script>
    +((all_tipe) => {
        all_tipe = <?= Json::encode($all_tipe_model) ?>;
        window.element = window.element || ((s, c) => (c || document).querySelector(s))
        window.elements = window.elements || ((s, c) => (c || document).querySelectorAll(s))

        const get_tipe = (id, tipe, i) => {
            for (i in all_tipe) {
                tipe = all_tipe[i]
                if (id === tipe.id - 0) return tipe
            }
        }

        const date_format = (t) => ({
            6: 'Y-m-d',
            7: 'H:i:S',
            8: 'Y-m-d H:i:S'
        } [t])
        const is_opt = t => [4, 5].find(_t => _t == t)
        const has_default = (t, atr) => {
            if (!t.atribut) return !(t.atribut = [])
            if (!t.atribut.find) t.atribut = t.atribut.split(',')
            return t.atribut.find(a => a == 1)
        }

        let fpopts = {
            wrap: true,
            time_24hr: true,
            enableSeconds: true,
            monthSelectorType: 'static',
        }

        let slimslc
        let inp_def = element('#parameter-default')
        let inp_dt = element('#parameter-datetime')
        let row_defs = elements('.field-default .form-group')

        const setDefault = (id_tipe, tipe) => {
            row_defs.forEach(r => r.style.display = 'none')
            tipe = get_tipe(id_tipe)

            if (!has_default(tipe)) return
            if (is_opt(id_tipe)) {
                return row_defs[1].style.display = '';
            }
            if (id_tipe > 5 && id_tipe < 9) {
                row_defs[2].style.display = '';
                fpopts.dateFormat = date_format(id_tipe)
                fpopts.enableTime = (id_tipe > 6 && id_tipe < 9)
                if (id_tipe === 7) {
                    fpopts.noCalendar = true
                    row_defs[2].querySelector('i.toggle').classList.add('glyphicon-time')
                    row_defs[2].querySelector('i.toggle').classList.remove('glyphicon-calendar')
                } else {
                    fpopts.noCalendar = false
                    row_defs[2].querySelector('i.toggle').classList.add('glyphicon-calendar')
                    row_defs[2].querySelector('i.toggle').classList.remove('glyphicon-time')
                }
                return flatpickr(row_defs[2], fpopts)
            }

            row_defs[0].style.display = '';
            inp_def.type = (id_tipe === 3) ? 'number' : '';
        }

        const initParamOptions = () => {
            let slim = new SlimSelect({
                valuesUseText: false,
                closeOnSelect: false,
                allowDeselect: true,
                select: '#param-opts',
                addable: (value) => ({
                    text: `<span>${value}</span><button class="remove">×</button>`,
                    value
                }),
                beforeChange(ev, opt) {
                    if (!ev.target.classList.contains('remove')) {
                        return this.hasDefault = true
                    }

                    for (let i = 0; i < this.slim.list.children.length; i++) {
                        if (this.slim.list.children[i].dataset.id === opt.id) {
                            return this.select.element.options[i].remove()
                        }
                    }
                },
                afterChange(opt) {
                    if (!this.hasDefault) {
                        this.slim.singleSelected.deselect.click()
                    }
                },
            })

            slim.slim.singleSelected.deselect.addEventListener('click', () => slim.open())
        }

        document.addEventListener('DOMContentLoaded', (select) => {
            initParamOptions()
            select = element('.field-parameter-id_tipe select')
            select.addEventListener('change', (ev) => setDefault(ev.currentTarget.value - 0))
            select.dispatchEvent(new CustomEvent('change'))
            element('.flatpickr [data-clear]').click()
        })

        let form = element('#param-form')
        form.addEventListener('submit', (ev, input) => {
            elements('.ss-main .ss-option').forEach((opt) => {
                input = document.createElement('input')
                input.type = 'hidden'
                input.name = `Parameter[options][${opt.dataset.id}]`
                input.value = element('span', opt).innerHTML
                form.append(input)

                if (!opt.classList.contains('ss-option-selected')) return
                ev.target['Parameter[default]'].value = opt.dataset.id
            })
        })
    })()
</script>

<?php ActiveForm::end(); ?>
