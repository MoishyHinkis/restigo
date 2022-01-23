import DataTable from '@/Components/DataTable'
import { InertiaLink } from '@inertiajs/inertia-react'


function Order({ order }) {

    const cols = (item, col) => {

        let data = null
        switch (col) {
            case 'id':
                data = item.item.id
                break;
            case 'name':
                data = item.item.name
                break;
            case 'amount':
                data = item.amount
                break;
            case 'price':
                data = item.item.price
                break;
            case 'total price':
                data = item.item.price * item.amount
                break;

            default:
                break;
        }

        return <div>{data}</div>
    }

    return <div>
        <div >
        <div className='text-center text-5xl text-blue-500 p-4' >
            order {order.data.id}
        </div>
            <div className='m-4 text-3xl' >
                <InertiaLink href='/orders' >
                    {'<-'}  back to orders
                </InertiaLink>
            </div>
            <div className='flex justify-center p-4' >
                <div>
                    <DataTable columns={['id', 'name', 'amount', 'price', 'total price']} items={order.data.amounts} >
                        {(item, column) => cols(item, column)}
                    </DataTable>
                    <div>total:{order.data.worth}  |  due:{order.data.due } </div>
                </div>
            </div>
        </div>
    </div>
}

export default Order