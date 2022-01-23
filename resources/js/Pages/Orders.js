import NavBar from "@/Layouts/NavBar"
import DataTable from "@/Components/DataTable"
import { Inertia } from '@inertiajs/inertia'
import { InertiaLink } from '@inertiajs/inertia-react'

function Orders({ orders, suplliers, filters }) {


    const OrdersList = () => {

        const cols = (item, col) => {
            let data = null;
            switch (col) {
                case 'id':
                    data = <InertiaLink href={`/orders/${item.id}`} >

                        {item.id}
                    </InertiaLink>
                    break;
                case 'supllier':
                    data = item.supllier.name
                    break;
                case 'sent date':
                    data = item.sent_at
                    break;
                case 'due date':
                    data = item.due
                    break;
                case 'worth':
                    data = item.worth
                    break;


            }
            return <div>
                <div>


                    {data}
                </div>
            </div>
        }

        return <div>
            {
                orders.data.length > 0 ?
                    <DataTable columns={['id', 'supllier', 'sent date', 'due date', 'worth']} items={orders.data} >
                        {(item, column) => cols(item, column)}
                    </DataTable> : 'no orders by this selectors'
            }
        </div>
    }

    return <div>
        <NavBar current={'orders'} >
            <h2 className='p-6 text-2xl text-center' >
                Orders
            </h2>
            <div>
                <select name="supllier" id="supllier" defaultValue={filters['currentSupllier']} onChange={(event) => {
                    Inertia.reload({
                        data: { supllier: event.target.value }
                    })
                }} >
                    <option >{'all'}</option>
                    {suplliers.data.map((supllier) => {
                        return <option key={supllier.id} value={supllier.id}>{supllier.name}</option>
                    })}
                </select>
                <input type="date" name="due" id="due" defaultValue={filters['due']} onChange={(e) => {
                    Inertia.reload({ data: { due: e.target.value } })
                }} />
                <input type="text" name="search" id="search" defaultValue={filters['search']} placeholder="serach for order number..." onChange={(e) => {
                    Inertia.reload({ data: { search: e.target.value } })
                }} />
            </div>
            <div className="flex justify-center p-8">
                <OrdersList></OrdersList>
            </div>
        </NavBar>
    </div>
}

export default Orders