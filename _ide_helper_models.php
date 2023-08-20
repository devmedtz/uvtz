<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Customer
 *
 * @property int $id
 * @property string $customer_name
 * @property string $customer_phone
 * @property string $customer_city
 * @property string $customer_address
 * @property int $status
 * @property string $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Customer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Customer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Customer query()
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereCustomerAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereCustomerCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereCustomerName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereCustomerPhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereUpdatedAt($value)
 */
	class Customer extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\CustomerDetails
 *
 * @property int $id
 * @property int $customer_id
 * @property int $status
 * @property string $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerDetails newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerDetails newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerDetails query()
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerDetails whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerDetails whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerDetails whereCustomerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerDetails whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerDetails whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerDetails whereUpdatedAt($value)
 */
	class CustomerDetails extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Employee
 *
 * @property int $id
 * @property string $emp_name
 * @property string $phone
 * @property string $title
 * @property string|null $lmp
 * @property float|null $t_sal
 * @property int $status
 * @property string $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Employee newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Employee newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Employee query()
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereEmpName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereLmp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereTSal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereUpdatedAt($value)
 */
	class Employee extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\EmployeeDetails
 *
 * @property int $id
 * @property int|null $emp_id
 * @property string $pay_date
 * @property float $salary_amount
 * @property string $salary_month
 * @property string $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|EmployeeDetails newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EmployeeDetails newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EmployeeDetails query()
 * @method static \Illuminate\Database\Eloquent\Builder|EmployeeDetails whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmployeeDetails whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmployeeDetails whereEmpId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmployeeDetails whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmployeeDetails wherePayDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmployeeDetails whereSalaryAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmployeeDetails whereSalaryMonth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmployeeDetails whereUpdatedAt($value)
 */
	class EmployeeDetails extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\EmployeeSalary
 *
 * @property int $id
 * @property int|null $emp_id
 * @property string $pay_date
 * @property float $salary_amount
 * @property string $salary_month
 * @property string $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|EmployeeSalary newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EmployeeSalary newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EmployeeSalary query()
 * @method static \Illuminate\Database\Eloquent\Builder|EmployeeSalary whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmployeeSalary whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmployeeSalary whereEmpId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmployeeSalary whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmployeeSalary wherePayDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmployeeSalary whereSalaryAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmployeeSalary whereSalaryMonth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmployeeSalary whereUpdatedAt($value)
 */
	class EmployeeSalary extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Expenses
 *
 * @property int $id
 * @property int $category_id
 * @property string $date
 * @property string|null $reference
 * @property string|null $details
 * @property int $amount
 * @property int $status
 * @property string $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Expenses newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Expenses newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Expenses query()
 * @method static \Illuminate\Database\Eloquent\Builder|Expenses whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Expenses whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Expenses whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Expenses whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Expenses whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Expenses whereDetails($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Expenses whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Expenses whereReference($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Expenses whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Expenses whereUpdatedAt($value)
 */
	class Expenses extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ExpensesCategory
 *
 * @property int $id
 * @property string $category_name
 * @property string|null $category_description
 * @property int $status
 * @property string $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ExpensesCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ExpensesCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ExpensesCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|ExpensesCategory whereCategoryDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExpensesCategory whereCategoryName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExpensesCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExpensesCategory whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExpensesCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExpensesCategory whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExpensesCategory whereUpdatedAt($value)
 */
	class ExpensesCategory extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ExpensesDetails
 *
 * @property int $id
 * @property int $expenses_id
 * @property string $date
 * @property string $reference
 * @property string|null $details
 * @property int $amount
 * @property int $status
 * @property string $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ExpensesDetails newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ExpensesDetails newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ExpensesDetails query()
 * @method static \Illuminate\Database\Eloquent\Builder|ExpensesDetails whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExpensesDetails whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExpensesDetails whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExpensesDetails whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExpensesDetails whereDetails($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExpensesDetails whereExpensesId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExpensesDetails whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExpensesDetails whereReference($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExpensesDetails whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExpensesDetails whereUpdatedAt($value)
 */
	class ExpensesDetails extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Product
 *
 * @property int $id
 * @property int $category_id
 * @property string $product_name
 * @property string|null $product_code
 * @property string|null $product_barcode_symbology
 * @property int|null $product_quantity
 * @property int $product_cost
 * @property int $product_price
 * @property int|null $temp
 * @property int|null $temp_status
 * @property string|null $user_name
 * @property string|null $note
 * @property string|null $product_unit
 * @property int $product_stock_alert
 * @property int|null $product_order_tax
 * @property int|null $product_tax_type
 * @property string|null $product_note
 * @property int $status
 * @property string $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product query()
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereProductBarcodeSymbology($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereProductCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereProductCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereProductName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereProductNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereProductOrderTax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereProductPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereProductQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereProductStockAlert($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereProductTaxType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereProductUnit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereTemp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereTempStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereUserName($value)
 */
	class Product extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ProductAdjastment
 *
 * @property int $id
 * @property int $product_id
 * @property int $product_quantity
 * @property int|null $temp
 * @property int|null $temp_status
 * @property string|null $user_name
 * @property string|null $note
 * @property string $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ProductAdjastment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductAdjastment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductAdjastment query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductAdjastment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductAdjastment whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductAdjastment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductAdjastment whereNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductAdjastment whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductAdjastment whereProductQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductAdjastment whereTemp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductAdjastment whereTempStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductAdjastment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductAdjastment whereUserName($value)
 */
	class ProductAdjastment extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ProductCategory
 *
 * @property int $id
 * @property string $category_code
 * @property string $category_name
 * @property int $status
 * @property string $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCategory whereCategoryCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCategory whereCategoryName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCategory whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCategory whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCategory whereUpdatedAt($value)
 */
	class ProductCategory extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ProductHistory
 *
 * @property int $id
 * @property int $product_id
 * @property int $product_quantity
 * @property int $product_cost
 * @property int $product_price
 * @property int $product_stock_alert
 * @property int|null $product_order_tax
 * @property int|null $product_tax_type
 * @property string|null $product_note
 * @property string $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ProductHistory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductHistory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductHistory query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductHistory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductHistory whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductHistory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductHistory whereProductCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductHistory whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductHistory whereProductNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductHistory whereProductOrderTax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductHistory whereProductPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductHistory whereProductQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductHistory whereProductStockAlert($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductHistory whereProductTaxType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductHistory whereUpdatedAt($value)
 */
	class ProductHistory extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ProductionDetails
 *
 * @property int $id
 * @property int|null $production_id
 * @property int $action
 * @property int $qty
 * @property string $mat_date
 * @property string|null $material_note
 * @property int $status
 * @property string $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ProductionDetails newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductionDetails newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductionDetails query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductionDetails whereAction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductionDetails whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductionDetails whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductionDetails whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductionDetails whereMatDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductionDetails whereMaterialNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductionDetails whereProductionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductionDetails whereQty($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductionDetails whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductionDetails whereUpdatedAt($value)
 */
	class ProductionDetails extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ProductionMaterials
 *
 * @property int $id
 * @property string $material_name
 * @property string $material_unit
 * @property int $available_unit
 * @property int $total_unit
 * @property string|null $material_note
 * @property int $status
 * @property string $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ProductionMaterials newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductionMaterials newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductionMaterials query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductionMaterials whereAvailableUnit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductionMaterials whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductionMaterials whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductionMaterials whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductionMaterials whereMaterialName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductionMaterials whereMaterialNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductionMaterials whereMaterialUnit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductionMaterials whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductionMaterials whereTotalUnit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductionMaterials whereUpdatedAt($value)
 */
	class ProductionMaterials extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Purchase
 *
 * @property int $id
 * @property string $date
 * @property string $reference
 * @property int|null $supplier_id
 * @property string $supplier_name
 * @property int $tax_percentage
 * @property int $tax_amount
 * @property int $discount_percentage
 * @property int $discount_amount
 * @property int $shipping_amount
 * @property int $total_amount
 * @property int $paid_amount
 * @property int $due_amount
 * @property string $payment_status
 * @property string $payment_method
 * @property string|null $note
 * @property int $status
 * @property string $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Purchase newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Purchase newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Purchase query()
 * @method static \Illuminate\Database\Eloquent\Builder|Purchase whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Purchase whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Purchase whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Purchase whereDiscountAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Purchase whereDiscountPercentage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Purchase whereDueAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Purchase whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Purchase whereNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Purchase wherePaidAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Purchase wherePaymentMethod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Purchase wherePaymentStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Purchase whereReference($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Purchase whereShippingAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Purchase whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Purchase whereSupplierId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Purchase whereSupplierName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Purchase whereTaxAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Purchase whereTaxPercentage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Purchase whereTotalAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Purchase whereUpdatedAt($value)
 */
	class Purchase extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\PurchaseDetails
 *
 * @property int $id
 * @property int $purchase_id
 * @property int|null $product_id
 * @property string $product_name
 * @property string $product_code
 * @property int $quantity
 * @property int $price
 * @property int $unit_price
 * @property int $sub_total
 * @property int $product_discount_amount
 * @property string $product_discount_type
 * @property int $product_tax_amount
 * @property int $status
 * @property string $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseDetails newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseDetails newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseDetails query()
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseDetails whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseDetails whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseDetails whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseDetails wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseDetails whereProductCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseDetails whereProductDiscountAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseDetails whereProductDiscountType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseDetails whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseDetails whereProductName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseDetails whereProductTaxAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseDetails wherePurchaseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseDetails whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseDetails whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseDetails whereSubTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseDetails whereUnitPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseDetails whereUpdatedAt($value)
 */
	class PurchaseDetails extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\PurchasePayment
 *
 * @property int $id
 * @property int $purchase_id
 * @property int $amount
 * @property string $date
 * @property string $reference
 * @property string $payment_method
 * @property string|null $note
 * @property int $status
 * @property string $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|PurchasePayment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PurchasePayment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PurchasePayment query()
 * @method static \Illuminate\Database\Eloquent\Builder|PurchasePayment whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchasePayment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchasePayment whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchasePayment whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchasePayment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchasePayment whereNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchasePayment wherePaymentMethod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchasePayment wherePurchaseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchasePayment whereReference($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchasePayment whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchasePayment whereUpdatedAt($value)
 */
	class PurchasePayment extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\PurchaseReturn
 *
 * @property int $id
 * @property string $date
 * @property string $reference
 * @property int|null $supplier_id
 * @property string $supplier_name
 * @property int $tax_percentage
 * @property int $tax_amount
 * @property int $discount_percentage
 * @property int $discount_amount
 * @property int $shipping_amount
 * @property int $total_amount
 * @property int $paid_amount
 * @property int $due_amount
 * @property string $payment_status
 * @property string $payment_method
 * @property string|null $note
 * @property int $status
 * @property string $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseReturn newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseReturn newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseReturn query()
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseReturn whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseReturn whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseReturn whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseReturn whereDiscountAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseReturn whereDiscountPercentage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseReturn whereDueAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseReturn whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseReturn whereNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseReturn wherePaidAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseReturn wherePaymentMethod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseReturn wherePaymentStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseReturn whereReference($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseReturn whereShippingAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseReturn whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseReturn whereSupplierId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseReturn whereSupplierName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseReturn whereTaxAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseReturn whereTaxPercentage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseReturn whereTotalAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseReturn whereUpdatedAt($value)
 */
	class PurchaseReturn extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\PurchaseReturnDetails
 *
 * @property int $id
 * @property int $purchase_return_id
 * @property int|null $product_id
 * @property string $product_name
 * @property string $product_code
 * @property int $quantity
 * @property int $price
 * @property int $unit_price
 * @property int $sub_total
 * @property int $product_discount_amount
 * @property string $product_discount_type
 * @property int $product_tax_amount
 * @property int $status
 * @property string $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseReturnDetails newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseReturnDetails newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseReturnDetails query()
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseReturnDetails whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseReturnDetails whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseReturnDetails whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseReturnDetails wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseReturnDetails whereProductCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseReturnDetails whereProductDiscountAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseReturnDetails whereProductDiscountType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseReturnDetails whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseReturnDetails whereProductName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseReturnDetails whereProductTaxAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseReturnDetails wherePurchaseReturnId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseReturnDetails whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseReturnDetails whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseReturnDetails whereSubTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseReturnDetails whereUnitPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseReturnDetails whereUpdatedAt($value)
 */
	class PurchaseReturnDetails extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\PurchaseReturnPayment
 *
 * @property int $id
 * @property int $purchase_return_id
 * @property int $amount
 * @property string $date
 * @property string $reference
 * @property string $payment_method
 * @property string|null $note
 * @property int $status
 * @property string $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseReturnPayment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseReturnPayment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseReturnPayment query()
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseReturnPayment whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseReturnPayment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseReturnPayment whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseReturnPayment whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseReturnPayment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseReturnPayment whereNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseReturnPayment wherePaymentMethod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseReturnPayment wherePurchaseReturnId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseReturnPayment whereReference($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseReturnPayment whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseReturnPayment whereUpdatedAt($value)
 */
	class PurchaseReturnPayment extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Region
 *
 * @property int $id
 * @property string $region_name
 * @property string $code
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Region newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Region newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Region query()
 * @method static \Illuminate\Database\Eloquent\Builder|Region whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Region whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Region whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Region whereRegionName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Region whereUpdatedAt($value)
 */
	class Region extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\SalePayment
 *
 * @property int $id
 * @property int $sale_id
 * @property int $amount
 * @property string $date
 * @property string $payment_method
 * @property string|null $note
 * @property int $status
 * @property string $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|SalePayment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SalePayment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SalePayment query()
 * @method static \Illuminate\Database\Eloquent\Builder|SalePayment whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalePayment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalePayment whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalePayment whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalePayment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalePayment whereNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalePayment wherePaymentMethod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalePayment whereSaleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalePayment whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalePayment whereUpdatedAt($value)
 */
	class SalePayment extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Sales
 *
 * @property int $id
 * @property string $date
 * @property string $inv_no
 * @property int|null $customer_id
 * @property string $customer_name
 * @property int $tax_percentage
 * @property int $tax_amount
 * @property int $discount_percentage
 * @property int $discount_amount
 * @property int $shipping
 * @property int $total_amount
 * @property int $transport
 * @property int $paid_amount
 * @property int $due_amount
 * @property string $payment_status
 * @property string $payment_method
 * @property string|null $note
 * @property int $status
 * @property string $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $due_date
 * @method static \Illuminate\Database\Eloquent\Builder|Sales newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Sales newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Sales query()
 * @method static \Illuminate\Database\Eloquent\Builder|Sales whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sales whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sales whereCustomerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sales whereCustomerName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sales whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sales whereDiscountAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sales whereDiscountPercentage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sales whereDueAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sales whereDueDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sales whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sales whereInvNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sales whereNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sales wherePaidAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sales wherePaymentMethod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sales wherePaymentStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sales whereShipping($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sales whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sales whereTaxAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sales whereTaxPercentage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sales whereTotalAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sales whereTransport($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sales whereUpdatedAt($value)
 */
	class Sales extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\SalesDetails
 *
 * @property int $id
 * @property int $sale_id
 * @property int|null $product_id
 * @property string $product_name
 * @property string $product_code
 * @property int $quantity
 * @property int $price
 * @property int $unit_price
 * @property int $sub_total
 * @property int $product_discount_amount
 * @property string $product_discount_type
 * @property int $product_tax_amount
 * @property int $status
 * @property string $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|SalesDetails newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SalesDetails newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SalesDetails query()
 * @method static \Illuminate\Database\Eloquent\Builder|SalesDetails whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalesDetails whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalesDetails whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalesDetails wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalesDetails whereProductCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalesDetails whereProductDiscountAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalesDetails whereProductDiscountType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalesDetails whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalesDetails whereProductName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalesDetails whereProductTaxAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalesDetails whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalesDetails whereSaleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalesDetails whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalesDetails whereSubTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalesDetails whereUnitPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalesDetails whereUpdatedAt($value)
 */
	class SalesDetails extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\SalesRetuenPayment
 *
 * @property int $id
 * @property int $sale_return_id
 * @property int $amount
 * @property string $date
 * @property string $reference
 * @property string $payment_method
 * @property string|null $note
 * @property int $status
 * @property string $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|SalesRetuenPayment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SalesRetuenPayment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SalesRetuenPayment query()
 * @method static \Illuminate\Database\Eloquent\Builder|SalesRetuenPayment whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalesRetuenPayment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalesRetuenPayment whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalesRetuenPayment whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalesRetuenPayment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalesRetuenPayment whereNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalesRetuenPayment wherePaymentMethod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalesRetuenPayment whereReference($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalesRetuenPayment whereSaleReturnId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalesRetuenPayment whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalesRetuenPayment whereUpdatedAt($value)
 */
	class SalesRetuenPayment extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\SalesReturn
 *
 * @property int $id
 * @property string $date
 * @property string $reference
 * @property int|null $customer_id
 * @property string $customer_name
 * @property int $tax_percentage
 * @property int $tax_amount
 * @property int $discount_percentage
 * @property int $discount_amount
 * @property int $shipping_amount
 * @property int $total_amount
 * @property int $paid_amount
 * @property int $due_amount
 * @property string $payment_status
 * @property string $payment_method
 * @property string|null $note
 * @property int $status
 * @property string $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|SalesReturn newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SalesReturn newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SalesReturn query()
 * @method static \Illuminate\Database\Eloquent\Builder|SalesReturn whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalesReturn whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalesReturn whereCustomerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalesReturn whereCustomerName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalesReturn whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalesReturn whereDiscountAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalesReturn whereDiscountPercentage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalesReturn whereDueAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalesReturn whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalesReturn whereNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalesReturn wherePaidAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalesReturn wherePaymentMethod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalesReturn wherePaymentStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalesReturn whereReference($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalesReturn whereShippingAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalesReturn whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalesReturn whereTaxAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalesReturn whereTaxPercentage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalesReturn whereTotalAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalesReturn whereUpdatedAt($value)
 */
	class SalesReturn extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\SalesReturnDetails
 *
 * @property int $id
 * @property int $sale_return_id
 * @property int|null $product_id
 * @property string $product_name
 * @property string $product_code
 * @property int $quantity
 * @property int $price
 * @property int $unit_price
 * @property int $sub_total
 * @property int $product_discount_amount
 * @property string $product_discount_type
 * @property int $product_tax_amount
 * @property int $status
 * @property string $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|SalesReturnDetails newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SalesReturnDetails newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SalesReturnDetails query()
 * @method static \Illuminate\Database\Eloquent\Builder|SalesReturnDetails whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalesReturnDetails whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalesReturnDetails whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalesReturnDetails wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalesReturnDetails whereProductCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalesReturnDetails whereProductDiscountAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalesReturnDetails whereProductDiscountType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalesReturnDetails whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalesReturnDetails whereProductName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalesReturnDetails whereProductTaxAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalesReturnDetails whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalesReturnDetails whereSaleReturnId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalesReturnDetails whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalesReturnDetails whereSubTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalesReturnDetails whereUnitPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalesReturnDetails whereUpdatedAt($value)
 */
	class SalesReturnDetails extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Supplier
 *
 * @property int $id
 * @property string $supplier_name
 * @property string $supplier_phone
 * @property string $supplier_city
 * @property string $supplier_address
 * @property int $status
 * @property string $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Supplier newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Supplier newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Supplier query()
 * @method static \Illuminate\Database\Eloquent\Builder|Supplier whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Supplier whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Supplier whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Supplier whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Supplier whereSupplierAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Supplier whereSupplierCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Supplier whereSupplierName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Supplier whereSupplierPhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Supplier whereUpdatedAt($value)
 */
	class Supplier extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\SupplierDetails
 *
 * @property int $id
 * @property int $supplier_id
 * @property int $status
 * @property string $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|SupplierDetails newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SupplierDetails newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SupplierDetails query()
 * @method static \Illuminate\Database\Eloquent\Builder|SupplierDetails whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SupplierDetails whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SupplierDetails whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SupplierDetails whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SupplierDetails whereSupplierId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SupplierDetails whereUpdatedAt($value)
 */
	class SupplierDetails extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $two_factor_secret
 * @property string|null $two_factor_recovery_codes
 * @property string|null $two_factor_confirmed_at
 * @property string|null $role
 * @property int|null $is_active
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Permission> $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Role> $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User role($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTwoFactorConfirmedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTwoFactorRecoveryCodes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTwoFactorSecret($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

