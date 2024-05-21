import { useEffect, useRef, useState } from 'react';
import axios from 'axios';
import { Col, Form, Row } from 'react-bootstrap';


const Dictionary = () => {
    const [subjects, setSubjects] = useState([]);
    const [subject, setSubject] = useState("");
    const [words, setWords] = useState([]);
    const [matches, setMatches] = useState({});
    const matchCount = useRef(0);

    useEffect(() => {
        axios.get('http://localhost:8000/api/temak')
            .then(response => {
                setSubjects(response.data)
            })
            .catch(error => {
                console.error(error)
            })
    }, [])

    useEffect(() => {
        axios.get('http://localhost:8000/api/szavak/' + subject)
            .then(response => {
                setWords(response.data)
            })
            .catch(error => {
                console.error(error)
            })
    }, [subject])

    const subjectChange = (e) => {
        setSubject(e.target.value)
    }

    const translationChange = (entry, text) => {
        if (entry.hu === text)
            setMatches({ ...matches, [entry.en]: 1 })
        else
            setMatches({ ...matches, [entry.en]: 0 })
    }

    matchCount.current = (Object.values(matches).reduce((total, current) => total += current, 0));

    return (<>
        <h1>Szótár</h1>
        <Form.Select onChange={subjectChange}>
            <option value="">(mind)</option>
            {subjects && subjects.map((e, i) => <option idx={i} value={e.id}>{e.name}</option>)}
        </Form.Select>
        <div><b>Találatok: {matchCount.current}</b></div>
        <Row className="d-sm-flex d-lg-none">
            <Col>Angol</Col>
            <Col>Magyar</Col>
            <Col>Visszajelzés</Col>
        </Row>
        {words && words.map((e, i) => <Word entry={e} textChange={translationChange} />)}
    </>)

}

const Word = (props) => {
    const [value, setValue] = useState('');
    const [status, setStatus] = useState('');
    const { en, hu } = props.entry;

    const valueChange = (value) => {
        setValue(value)
        let status
        if (value === '')
            status = ''
        else if (value === hu)
            status = 'correct'
        else
            status = 'wrong'
        props.textChange(props.entry, value)
        setStatus(status)
    }

    return (
        <Row className="mb-2">
            <Col className="d-md-none d-lg-block"><b>Angol</b></Col>
            <Col lg={3}>{en}</Col>
            <Col className="d-md-none d-lg-block"><b>Magyar</b></Col>
            <Col lg={3}><Form.Control value={value} onChange={(e) => valueChange(e.target.value)} /></Col>
            <Col lg={3}>
                {status === 'correct' && <>Helyes! <span style={{ color: "green" }}>✔</span></>}
                {status === 'wrong' && <>Hibás!<span style={{ color: "red" }}>✘</span></>}
            </Col>
        </Row>
    )
}
export default Dictionary;


