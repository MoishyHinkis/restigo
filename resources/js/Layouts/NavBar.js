import { InertiaLink } from "@inertiajs/inertia-react"


function NavBar({ children, current }) {
    return <div>
        <div>
            <div className="w-full bg-green-500 flex">
            <div className={`grow text-center p-4 ${current === "supllier" ? "bg-green-600" : ""} hover:bg-green-700`}>

                <InertiaLink href={'/'} >
                    new order
                </InertiaLink>
            </div>
            <div className={`grow text-center p-4 ${current === "orders" ? "bg-green-600" : ""} hover:bg-green-700`}>
                <InertiaLink href={'/orders'} >

                    all orders
                </InertiaLink>
            </div>
            </div>
        </div>
        {children}
    </div>
}

export default NavBar