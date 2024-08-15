import { useState } from "react";

export function useGeolocate() {
	const [count,setCount] = useState(null)
	const [gps,setGps] = useState("")
	const [isLoading,setIsLoading] = useState(false)

	useEffect(function() {
		setIsLoading(true)
		// browser API Call
		function handleLocation() {
			setCount((current) => current + 1)
		}	

		setIsLoading(false)

	},[action])

	return {count,setCount,gps,isLoading,handleLocation};
}

export default Geolocate() {
	
	const {count,setCount,gps, isLoading,handleLocation} = useGeolocate()

	

	return (
		<div className="">
			<button disabled={isLoading} onClick={() => handleLocation()}>Get my position</button>
			<p>Your GPS position is : <a href={``}></a>{gps}</p>
			<p>You requested position {count} times</p>
		</div>

	)
}