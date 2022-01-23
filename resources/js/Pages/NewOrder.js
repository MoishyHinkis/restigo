import React, { createRef, useEffect, useState } from 'react';
import { Link, Head, useForm, usePage } from '@inertiajs/inertia-react';
import { Inertia } from '@inertiajs/inertia'
import Supllier from '@/Components/Supplier';
import DataTable from '@/Components/DataTable'
import NavBar from '@/Layouts/NavBar';

export default function NewOrder({ suplliers, currentSupllier = null, items = { data: [] } }) {

    const { focus, errors } = usePage().props
    useEffect(() => {
        if (focus) {
            document.getElementById(focus).focus()
        }
    });


    const setSupllier = (supllier) => {
        if (supllier.DraftOrder) {
        }
        else {
            Inertia.get(`/orders/${supllier.id}/create`, {
                supllier: supllier.id
            })
        }
    }

    const Suplliers = (suplliers) => {
        return <div className='flex flex-row justify-center space-x-4'>
            {
                suplliers.suplliers.data.map((supllier) => {
                    return <div key={supllier.id} >
                        <button onClick={() => {
                            setSupllier(supllier)
                        }} >
                            <Supllier supllier={supllier} current={supllier.id === currentSupllier?.data.id} />
                        </button>
                    </div>
                })
            }
        </div>

    }

    const Items = (items) => {

        const cols = (item, column) => {
            switch (column) {
                case 'name':
                    return <div>
                        {item.name}
                    </div>
                case 'price':
                    return <div>{item.price}</div>
                case 'amount':
                    const ref = `${item.id}amount`
                    const { data, setData, post, put, delete: destroy, isDirty, transform } = useForm({
                        amount: item.draftAmount?.amount ?? 0,
                        ref: ref
                    })
                    const setAmount = (amount) => {

                        setData(
                            { ...data, amount: amount }

                        )
                    }

                    useEffect(() => {
                        if (isDirty) {

                            if (item.draftAmount) {
                                if (data.amount > 0) {
                                    put(`/amounts/${item.draftAmount.id}`)
                                } else
                                    destroy(`/amounts/${item.draftAmount.id}`)
                            }
                            else {
                                if (currentSupllier.data.draftOrder) {
                                    transform((data) => ({
                                        ...data,
                                        item: item.id,
                                        order: currentSupllier.data.draftOrder.id
                                    }))
                                }
                                else {
                                    transform((data) => ({
                                        ...data,
                                        item: item.id,
                                        supllier: currentSupllier.data.id
                                    }))
                                }
                                post('/amounts')
                            }
                        }
                    }, [data.amount]);



                    return <div>
                        <div>
                            <button onClick={() => {
                                setAmount(data.amount + 1)
                            }} >+</button>
                            <input className='border-0' type="number" name="amount" id={ref} value={data.amount} min={0} onChange={(e) => { setAmount(e.target.value) }} />
                            <button onClick={() => {
                                setAmount(data.amount - 1)
                            }} >-</button>
                        </div>
                    </div>
            }
        }

        return <div>
            <DataTable
                items={items?.items.data}
                columns={['name', 'price', 'amount']}
            >
                {(item, column) => cols(item, column)}
            </DataTable>

        </div>

    }

    const DraftOrder = (order) => {

        const { data, setData, put, isDirty } = useForm({
            due: order.order?.due ?? '',
        })

        const setOrderDate = (due) => {
            setData({ ...data, due: due })
        }

        useEffect(() => {
            if (isDirty) {
                put(`/orders/${order.order?.id}`)
            }
        }, [data.due]);


        const cols = (column, item) => {
            let data = null
            switch (column) {
                case 'id':
                    data = item.item.id
                    break;
                case 'name':
                    data = item.item.name
                    break;
                case 'amount':
                    data = item.amount
                    break;
                case 'total':
                    data = item.item.price * item.amount
                    break;


            }
            return <div>{data}</div>
        }

        if (order.order === null) {
            return <div>

            </div>
        }
        return <div>
            <div>
                <DataTable items={order.order?.amounts} columns={['id', 'name', 'amount', 'total']} >
                    {(item, column) => cols(column, item)}
                </DataTable>
                <div>
                    total: {
                        order.order?.worth
                    } |
                    min_order: {currentSupllier.data.min_order}
                    <input type="date" name="due" id="due" value={data.due} onChange={(e) => {
                        setOrderDate(e.target.value)
                    }} />
                    <div className='text-center text-red-500 flex flex-col' >

                        <div>{errors?.due}</div>
                    </div>
                </div>
            </div>
            <div className='border border-2 bg-blue-200 hover:bg-green-100 border-blue-300 p-4' >
                <button onClick={() => {
                    Inertia.put(`/orders/${order.order?.id}/send`)
                }} >send {order.order?.id} </button>
                <div className='text-center text-red-500 flex flex-col' >
                    <div>
                        {errors?.customer_number}
                    </div>
                    <div>
                        {errors?.worth}
                    </div>
                    <div>
                        {errors['due date']}
                    </div>
                </div>
            </div>
        </div>
    }


    return (
        <>
            <Head title="Suppliers" />
            <div>
                <NavBar current={'supllier'} >

                    <h2 className='p-6 text-2xl text-center' >
                        Suplliers
                    </h2>
                    <Suplliers suplliers={suplliers} />
                    {currentSupllier ?
                        <div className='flex flex-row-reverse -space-x-32 place-content-center'>
                            <div className='mx-6' >
                                <Items items={items} />
                            </div>
                            <div className='mx-6' >
                                <DraftOrder order={currentSupllier?.data.draftOrder} />
                            </div>
                        </div>
                        : null
                    }
                </NavBar>
            </div>
        </>
    );
}


